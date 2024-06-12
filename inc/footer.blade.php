   
<div class="container-fluid footer">
<div class="row">
<div class="col-md-3">fsf</div>
<div class="col-md-3">fsf</div>
<div class="col-md-2">fsf</div>
<div class="col-md-2">fsf</div>
<div class="col-md-2">fsf</div>
</div>
</div>
<div class="container-fluid bottom-footer">
    <div class="row">
    <div class="col-md-6">fsf</div>
    <div class="col-md-4">fsf</div>
    <div class="col-md-2">fsf</div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>		
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <script id="rendered-js" >
$(document).ready(function () {


  //----------Select the first tab and div by default

  $('#vertical_tab_nav > ul > li > a').eq(0).addClass("selected");
  $('#vertical_tab_nav > div > article').eq(0).css('display', 'block');


  //---------- This assigns an onclick event to each tab link("a" tag) and passes a parameter to the showHideTab() function

  $('#vertical_tab_nav > ul').click(function (e) {

    if ($(e.target).is("a")) {

      /*Handle Tab Nav*/
      $('#vertical_tab_nav > ul > li > a').removeClass("selected");
      $(e.target).addClass("selected");

      /*Handles Tab Content*/
      var clicked_index = $("a", this).index(e.target);
      $('#vertical_tab_nav > div > article').css('display', 'none');
      $('#vertical_tab_nav > div > article').eq(clicked_index).fadeIn();

    }

    $(this).blur();
    return false;

  });


}); //end ready

/* if in drawer mode */
$(".tab_drawer_heading").click(function () {

  $("article").hide();
  var d_activeTab = $(this).attr("rel");
  $("#" + d_activeTab).fadeIn();

  $(".tab_drawer_heading").removeClass("d_active");
  $(this).addClass("d_active");

  $("ul.tabs li a").removeClass("selected");
  $("ul.tabs li a[rel^='" + d_activeTab + "']").addClass("selected");
});
//# sourceURL=pen.js
    </script>
</body>
</html>
