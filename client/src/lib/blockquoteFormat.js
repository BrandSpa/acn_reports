function blockquote() {
  $('blockquote').each(function(){
    let text = $(this).clone()    //clone the element
    .children() //select all the children
    .remove()   //remove all the children
    .end()  //again go back to selected element
    .text();    //get the text of element
    text = "»"+text+"«";
    let paragraph = document.createElement('p');
    paragraph.innerText = text;

    $(this).html(paragraph);

  });
}

export default function blockquoteFormat() {
  $(document).on('ready', blockquote());
}
