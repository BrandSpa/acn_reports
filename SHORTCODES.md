## SHORTCODES WITH REACT AND VISUAL COMPOSER

para crear shortcodes que se conecten en wordpress se debe pasar los props via data-props a algún nodo:

```html
<div data-props='{text: 'hola componente'}'></div>
```

En wordpress para crear un shortcode simplemente necesitamos crear una funcción que siempre tiene dos parametros que primero $atts que significa atributos y es un array y el segúndo es $content que como su nombre lo de dice trae contenido es de tipo string.

__shorcodes/demo_shortcode.php__
```php
function demo_shortcode($atts, $content = '') {
  $at = shortcode_atts( [
    text: 'default text'
  ], $atts );
  
  $props = [
    "text" => $at["text"],
    "content" => $content
  ];
  
  ob_start();
  
  ?>
  
  <div class="demo-container" data-props='<?php echo wp_json_encode($props); ?>'></div>
  
  <?php
  return ob_get_clean();
}


add_shortcode( 'demo', 'demo_shortcode' );
```

**ob_start()** lo que hace es un buffer del html y luego con la función **ob_get_clean()** devuelve el contenido del buffer que en este caso es el html y lo limpia.

**wp_json_encode()** convierte un array php a json.

**add_shortcode()** el primer parametro es el nombre que queremos que tenga el shortcode para usarlo y el segundo el nombre de la función que en este caso es el callback.


__components/demo.js__

```js
import React, { Component } from 'react';

class Demo extends Component {
  
  render() {
    <section>
      {this.props.text} // hola componente
    </section>
  }
}

export default Demo;

```

para obtener los props y hacer render de este componente debemos usar la singuiente libreria: [react render multiple](https://www.npmjs.com/package/react-multiple-render)

__app.js__

```js
import multipleRender from "react-multiple-render";

import Demo from './components/demo.js'

multipleRender('.demo-container', Demo);

```

multipleRender se encarga de pasar al componente los props que el container tiene en data-props y de hacer render del componente cuantas veces este presente el container estilo jquery.

Por úlitmo necesitamos conectar el shortcode a visual composer para poder usarlo en el editor.

__vc/demo.php__

```
<?php

function demo_vc() {
	 $params = [
			[
        "type" => "textarea_html",
        "heading" => "Content",
        "param_name" => "content",
        "value" => ''
			],
      [
        "type" => "textfield",
        "heading" => "Text",
        "param_name" => "text", // Debe concidir con los nombre de los attributos de shortcode_atts
        "value" => ''
			],
		];

  	vc_map(
      array(
        "name" =>  "Demo",
        "base" => "demo", // este nombre debe coincidir con add_shortcode( 'demo', 'demo_shortcode' );
        "category" =>  "BS",
        "params" => $params
      )
    );
};

add_action( 'vc_before_init', 'bs_accordion_vc' );

```

Despues de crear todo esto se debe compilar con webpack con el comando yarn o npm run build, luego hacer commit de todos los cambios y hacer push a la rama test.

Solicitar un usuario de wordpress.

Para probar el shortcode primero se debe crear una página nueva. [Crear una página](https://test.acninternational.org/wp-admin/post-new.php?post_type=page)


dentro de la pagina abrir el editor de visual composer y buscar el componente creado.

Para más documentación:
- [documentación shortcode](https://codex.wordpress.org/Shortcode_API)

- [documentación visual composer](https://wpbakery.atlassian.net/wiki/spaces/VC/pages/524332)
