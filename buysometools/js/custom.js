$(document).ready(function(){



//mini cart at the top of the hearder
	$('#basket-contents').hide();
	$('#basket-overview').hover(function()
	{
		$('#basket-contents').show();
	},
	function(){
		$('#basket-contents').hide();
	});
//finished with mini cart for the time being



			//ajax call to get everything read in for name autocomplete
			if($(".contact-form").length > 0)
			{
			$.ajax({
			  type: 'POST',
			url: "ajaxsearch.php",
			  data: 'type=first',
			  cache: false,
			  success: function(result) {
			    if(result){
			      resultObj = eval (result);
			    $('#firstname').keyup(function()
			    {$(this).autocomplete( {
			      source: resultObj,
			      minLength: 3
			      } )});
			    }
			  }
			});
//autocomplete last names
			  $.ajax({
			    type: 'POST',
			   url: 'ajaxsearch.php',
			    data: 'type=last',
			    cache: false,
			    success: function(result) {
			      if(result){
			        result = eval (result);
			      $('#lastname').keyup(function()
			      {$(this).autocomplete( {
			        source: result,
			        minLength: 3
			        } )});
			      }

						}

			  });
			}
//finsihed with the autocomplete for names




			//setting up search function for later

//autocomplete the search field
	$.ajax({
				type: 'POST',
			 url: 'ajaxsearch.php',
				data: 'type=db',
				cache: false,
				success: function(result) {
					if(result){
						result = eval (result);
					$('#searchbar').keyup(function()
					{$(this).autocomplete( {
						source: result,
						minLength:3
						} )});

					}


				}
			});

//STARTING TO DO MY SEARCH FUNCTION AND NOT JUST THE autocomplete





//search bar function that searches for the products
$(document).ready(function(){
    function makeAjaxRequest() {
        $.ajax({
						type: 'POST',
            url: 'searchbar.php',
            datatype: 'searchTerm',//was html
            data:{searchTerm: $('#searchbar').val()},
            success: function(url) {
                    //alert("Success!");
									$(location).attr('href',url);
            },

        });
    }

    $('#searchbutton').click(function(){
            makeAjaxRequest();
    });

    $('#dbsearch').submit(function(e){
            e.preventDefault();
            makeAjaxRequest();
    });
});
//end of searh function



//start of review function
$(document).ready(function(){
    function makeAjaxRequest() {
        $.ajax({
						type: 'POST',
            url: 'rating.php',
            datatype: 'rating',//was html
            data:$('#review-form'),
            success: function() {
                    alert("Success!");

            },

        });
    }

    $('#reviewbutton').click(function(){
            makeAjaxRequest();
    });

    $('#review-form').submit(function(e){
            e.preventDefault();
            makeAjaxRequest();
    });
});


//form validation
		$('#register-form').validate({
			  errorPlacement: function(error, element) {  },
			rules: {
				fname: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 8
				},
				password2: {
					equalTo: "#password"
				}
			}

		});


		$('#newpass-form').validate({
				errorPlacement: function(error, element) {  },
			rules: {
				oldpassword: {
					required: true,
					minlength: 8
				},
				password: {
					required: true,
					minlength: 8
				},
				password2: {
					equalTo: "#password"
				}
			}
		});


		$('#login').validate({
			errorPlacement: function(error, element) {  },
			rules:{	Email: {
					required: true,
					email: true
				},
				userpassword: {
					required: true,
					minlength: 8
				}

			}
		});
		$('#login-page').validate({
			errorPlacement: function(error, element) {  },
			rules:{	Email: {
					required: true,
					email: true
				},
				userpassword: {
					required: true,
					minlength: 8
				}

			}
		});

		$("#checkout-form").validate({
		 errorPlacement: function(error, element) {  },
			 rules: {
 				city: {
 						required: true
 					},
 				street:{
 					required: true
 				},
 				zip:{
 					required: true,
					minlength: 5,
					maxlength:5

 				},
 				state: {
 					required: true,
					minlength: 2,
					maxlength: 2

 				}
 			}
		});


		$("#payment-form").validate({
			 errorPlacement: function(error, element) {  },
			 rules: {
				 cardName: {
 					required: true
 				},
				cardNum : {
						required: true,
						minlength: 16,
						maxlength:16
					},
				cardExp: {
					required: true,
					minlength: 7,
					maxlength:7

				},
				cardSec: {
					required: true,
					minlength: 3,
					maxlength: 3

				}
			}
		});


//telephone form check
$('input[type=tel]').mask('(000) 000-0000');
//end telephone check




//go to top function
var goToTop = function() {

		$('.js-gotop').on('click', function(event){

			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');

			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});

	};
	$(function(){
		goToTop();
	});
//end of go to top function



//data tables for filtering by price

$('#products').DataTable();


$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {

        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );

				//	var price = $("td").text().replace("$"," ");
        var price = parseFloat( data[3] ) || 0; // use data for price



        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && price <= max ) ||
             ( min <= price   && isNaN( max ) ) ||
             ( min <= price   && price <= max ) )
        {
            return true;
        }


        return false;
    }
);



    // Event listener to the two range filtering inputs to redraw on input
		$(document).ready(function() {
		    var table = $('#products').DataTable();

		    // Event listener to the two range filtering inputs to redraw on input

				$('#min, #max').keyup(function() {

					table.draw();

		});

		} );



		$.fn.dataTable.ext.search.push(
		    function( settings, data, dataIndex ) {


						var rate = parseInt( $('#rating_star').val(), 10);//added this
						//	var price = $("td").text().replace("$"," ");

						  var rating = parseFloat( data[2] ) || 0;


		        if (( rate <= rating )||
								( rate == " "))
		        {
		            return true;
		        }


		        return false;
		    }
		);

		$(document).ready(function() {
				var table = $('#products').DataTable();

				// Event listener to the two range filtering inputs to redraw on input


				$('.rating').mouseout(function() {

					table.draw();

				});

		});


//end of data tables and filtering
//hiding my reviews until it is time to show reviews

//starting reviews functions
$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: '',
        imageDirectory: 'img',
        inputAttr: 'postID'
    });
});

(function(a){
    a.fn.codexworld_rating_widget = function(p){
        var p = p||{};
        var b = p&&p.starLength?p.starLength:"5";
        var c = p&&p.callbackFunctionName?p.callbackFunctionName:"";
        var e = p&&p.initialValue?p.initialValue:"0";
        var d = p&&p.imageDirectory?p.imageDirectory:"images";
        var r = p&&p.inputAttr?p.inputAttr:"";
        var f = e;
        var g = a(this);
        b = parseInt(b);
        init();
        g.next("ul").children("li").hover(function(){
            $(this).parent().children("li").css('background-position','0px 0px');
            var a = $(this).parent().children("li").index($(this));
            $(this).parent().children("li").slice(0,a+1).css('background-position','0px -28px')
        },function(){});
        g.next("ul").children("li").click(function(){
            var a = $(this).parent().children("li").index($(this));
            var attrVal = (r != '')?g.attr(r):'';
            f = a+1;
            g.val(f);
            if(c != ""){
                eval(c+"("+g.val()+", "+attrVal+")")
            }
        });
        g.next("ul").hover(function(){},function(){
            if(f == ""){
                $(this).children("li").slice(0,f).css('background-position','0px 0px')
            }else{
                $(this).children("li").css('background-position','0px 0px');
                $(this).children("li").slice(0,f).css('background-position','0px -28px')
            }
        });
        function init(){
            $('<div style="clear:both;"></div>').insertAfter(g);
            g.css("float","left");
            var a = $("<ul>");
            a.addClass("codexworld_rating_widget");
            for(var i=1;i<=b;i++){
                a.append('<li style="background-image:url('+d+'/widget_star.gif)"><span>'+i+'</span></li>')
            }
            a.insertAfter(g);
            if(e != ""){
                f = e;
                g.val(e);
                g.next("ul").children("li").slice(0,f).css('background-position','0px -28px')
            }
        }
    }
})(jQuery);




//function to update our shopping carts
$("input[name='prods']").focusout(function() {
			// ajax call to update quantities
			$.ajax({
				url: 'updatecart.php',
				type: 'POST',
				data: ({id: this.id, qty: $(this).val()}),
				success: function(data) {



				}
			});
		});



		$(document).ready(function(){

			$('.qty').change(function(){

				if($(this).val() == 0)//needs to be zero
				{

					$(this).parent().parent().hide();
					$('.' + this.id + 'miniqty').parent().parent().hide();
					$('#' + this.id + 'optqty').parent().parent().hide();

				}

//getting each item total

//var itemTotal = $('.'+ this.id + '_total');

			var itemTotal = $('#'+ this.id + '_total').html($('#'+ this.id + '_price').html()
							* $(this).val());

			var optTotal = $('#'+ this.id + '_opttotal').html($('#' + this.id + '_optionprice').html()
							 * $(this).val());


//getting th total for each cart//having trouble here
			var cartTotal = 0;
			var optionTotal = 0;

			$('.qty').each(function()
						{
							cartTotal +=  $('#' + this.id + '_price').html()
								* $(this).val();

							//checking for the options
										if ($('#' + this.id + 'options').length)
										 {

												 cartTotal += $('#' + this.id + '_optionprice').html()
	 												 * $(this).val();
											}



						});



//updating the cart values
						$('.cartTotal').html(cartTotal.toFixed(2));
						var tax = cartTotal * .06;
						$('#tax').html(tax.toFixed(2));
						var orderTotal = cartTotal + tax;
						$('#orderTotal').html(orderTotal.toFixed(2));


						//changing the qty of the add ons to equal the parrent
						$('#' + this.id + 'optqty').html($(this).val())

						//changes the mini cart val
						$('.' + this.id + 'miniqty').html($(this).val())


			});
		});
//ALSO DON'T HAVE ABOVE WORKING WITH THE CARTOPTS



var itemOpt = 0;

/// This make my option price change on my details and quickview page
var itemPrice = parseFloat($('.price').html()).toFixed(2);

		var itemOpt = parseFloat($('#' + this.id + '_optprice').html()).toFixed(2);


//var newPrice =	parseFloat(itemPrice) + parseFloat(itemOpt);

		$('.option').change(function(){
	itemOpt = parseFloat($('#' + this.id + '_optprice').html()).toFixed(2);
	var newPrice =	parseFloat(itemPrice) + parseFloat(itemOpt);

	$('.price').html(newPrice.toFixed(2));


		});

$('.reset').click(function(){

		$('.price').html(itemPrice);

});
/////END Of option price update




//showing and hiding of quickview and pulling up quickview
		$(document).ready(function(){
			$('.quickview').hide();
		$('.preview').mouseenter(function(){

		$(this).children('.quickview').show();

		});
		$('.preview').mouseleave(function(){
		$(this).children('.quickview').hide();
		});

		$('.quickview').click(function(){
		$.colorbox({href:"quickview.php?id=" + this.id, width:"600px" , height:"600px"});

		});
		});

//group of pictures on detail page for shadowbox
$(".group1").colorbox({rel:'group1', transition:"none", height:"65%"});



$(document).ready(function(){
	// Floating Labels
	//==============================================================
    $('[data-toggle="floatLabel"]').attr('data-value', $(this).val()).on('keyup change', function() {
		$(this).attr('data-value', $(this).val());
	});
});



//end of custom
});
