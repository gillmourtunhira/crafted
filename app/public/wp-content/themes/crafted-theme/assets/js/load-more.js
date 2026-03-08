jQuery(document).ready($ => {
  $('#load-more-btn').click(function () {
    const button = $(this);
    let page = parseInt(button.attr('data-page'));
    const order = button.attr('data-order');

    $.ajax({
      url: ajax_object.ajax_url,
      type: 'post',
      data: {
        action: 'load_more_posts',
        page,
        order
      },
      beforeSend() {
        button.text('Loading...');
      },
      success(response) {
        if (response.trim()) {
          $('#loaded-more-posts').append(response);
          page++;
          button.attr('data-page', page);
          button.text('Load More');
        } else {
          // No more posts
          button.hide();
        }
      },
      error() {
        button.text('Load More');
        alert('An error occurred. Please try again.');
      }
    });
  });
});
