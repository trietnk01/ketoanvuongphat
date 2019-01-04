// ------------------
// function
// ------------------

function p_a(a){
	alert(a);
}

function p_a2(a){

  if ( !p.is_localhost ) return;
  
  alert(a);
}

function p_c(a){
	console.log(a);
}


function p_c2(a){
  if ( !p.is_localhost ) return;

  console.log(a);
}


function p_t_pll(a,b){
  	if ( !p.is_polylang ) return a;

  	if ( p.is_vi ){
  		return a;
  	} else {
  		return b;
  	}

}

function js_t_pll(a,b){
  	if ( !p.is_polylang ) return a;

  	if ( p.is_vi ){
  		return a;
  	} else {
  		return b;
  	}

}

//alert( p_number_format('123032',0,",",".") );
function p_number_format( number, decimals, dec_point, thousands_sep ) {
                            
  var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
  var d = dec_point == undefined ? "," : dec_point;
  var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
  var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                            
  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}


function p_number_format_html( price, symbol = "VNĐ" ){
    return p_number_format(  price ,0,",",".")  + " " + symbol;
}


// random 
// $('.class').val( randomString(4) );
function p_randomString(len, charSet) {
    charSet = charSet || '0123456789';
    var randomString = '';
    for (var i = 0; i < len; i++) {
        var randomPoz = Math.floor(Math.random() * charSet.length);
        randomString += charSet.substring(randomPoz,randomPoz+1);
    }
    return randomString;
}



jQuery(function($){

    // click
    $(document).on('click', '[data-p-click]', function(e){
        e.preventDefault();

        var class1 = $(this).attr('data-p-click');

        $( class1 ).click();

    })

    // href
    $(document).on('click', '[data-p-href]', function(e){
     
       e.preventDefault();

        var href1 = $(this).attr('data-p-href');

       document.location.href = href1;

   })

})


