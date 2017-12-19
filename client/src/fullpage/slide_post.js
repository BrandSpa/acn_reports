
function slidePost($fp) {

  const emmiter = window.mitt;
  let $postSection;

  function closePost() {
    if($(".section__post--open").length > 0) {
      emmiter.emit("allow:scroll");
      $(".section__post--open").removeClass("section__post--open");
      $(".section__close-post").removeClass("section__close-post--open");
    }
  }

  function openPost($postSection) {
    emmiter.emit("stop:scroll");
    $postSection.addClass("section__post--open");
    $(".section__close-post").addClass("section__close-post--open");
  }

  function handleTogglePost(e) {
    $postSection = $(this).closest(".fp-tableCell").find(".section__post");

    if ($postSection.hasClass("section__post--open")) {

      closePost.call(this, $postSection, e);
    } else {
      openPost.call(this, $postSection, e);
    }
  }

  function clickOutside(evt) {
    if($(evt.target).is($postSection)) {
      console.log('post close outside');
      closePost($postSection);
    }
  }

  //Events
  $(document).on("click", ".section__open-post", handleTogglePost);
  $(document).on("click", ".section__close-post", handleTogglePost);
  emmiter.on("close:esc", closePost);
  emmiter.on("click:document", clickOutside);
}

export default slidePost;
