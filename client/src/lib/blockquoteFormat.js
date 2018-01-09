function blockquote() {
  let text = $('blockquote').each(function(){
    text = ">>"+text+"<<";
    let paragraph = document.createElement('p');
    paragraph.innerText = text;

    $(this).html(paragraph);

  });
}

export default function blockquoteFormat() {
  $(document).on('ready', blockquote);
}
