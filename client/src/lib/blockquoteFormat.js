function blockquote() {
  $('blockquote').each(function(){
    let text = $(this).text();
    text = ">>"+text+"<<";
    let paragraph = document.createElement('p');
    paragraph.innerText = text;

    $(this).html(paragraph);

  });
}

export default function blockquoteFormat() {
  $(document).on('ready', blockquote());
}
