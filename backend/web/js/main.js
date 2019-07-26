
$(document).ready(function(){
   // $('[data-toggle="tooltip"]').tooltip();
   var timeout;
   $('.table-bordered th').hover(function(){
      clearTimeout(timeout);
      var _this = $(this);
      if( _this.find('.sp_tooltip').css('display') !== 'block' )
         $('.sp_tooltip').hide();
      timeout = setTimeout(function(){
         _this.find('.sp_tooltip').show();
      },550);
   }, function(){
      clearTimeout(timeout);
      $(this).find('.sp_tooltip').hide();
   });

   var list_menu = $('.classic-menu-dropdown');
   if( list_menu.length > 0 ){
         for(var i = 0 ; i < list_menu.length; i++){
            var totalRow = $(list_menu[i]).find('.col-md-4').length;
            if(  totalRow > 0 ){
               var min_width= totalRow*244;
               if( min_width > 1000 )
                  min_width = 1000;
               $(list_menu[i]).find('.dropdown-menu').css('min-width',min_width + 'px');
            }
         }
   }

});

