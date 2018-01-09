function blockquote() {
  $('blockquote').each(function(){
    let text = $(this).text();
    let paragraph = document.createElement('p');
    text = "»"+text+"«";
    paragraph.innerText = text;
    $(paragraph).find('br, p').remove();
    $(this).html(paragraph);
  });
}

export default function blockquoteFormat() {
  $(document).on('ready', blockquote());
}
