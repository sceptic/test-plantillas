

function getVars(loc){
    console.log("-------------------------");
	var getString = loc.split('?')[1];
    console.log(getString);
	var GET = getString.split('&');
     console.log(GET);
	var get = {};
 
	for(var i = 0, l = GET.length; i < l; i++){
		var tmp = GET[i].split('=');
		get[tmp[0]] = unescape(decodeURI(tmp[1]));
	}
    console.log(get);
		return get;
    
}

function montarPixel(url, px){
	//Objeto parametros URL:
	console.log("PIXEL "+px);
	data = getVars(url);
	var rg = /((\/\$([a-z_]{1,})\$)|(=\$([a-z_]{1,})\$))/gi;
	//px = "miweb.php/$E_E_E$/adios=$adios$/1234" 
	px_params = px.match(rg);
	for(var i = 0 ; i < px_params.length ; i++)
	{
		_$param$ = px_params[i].replace("/","");
		$param$ = _$param$.replace("=","");
		param = $param$.replace(/\$/g,"");
		
		px= px.replace($param$,data[param]);
		px= px.replace("[ID_PIXEL]", makeid());
		//console.log(data[param]);
	}/**/

	return px;
}

function makeid()
{
    var text = "";
    var possible = "_-ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 10; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}



pixel = montarPixel("http://mi/?sid=adrian&b=marin", "http://adscendmedia.com/pbs2s/s2s.php?adv=384&key=b15b137a95&sid=$sid$");
console.log(pixel);
//-------------------------------------------------------------


var result;
var pixel;
var peticiones="";
$(function(){




	$('.pixel').on("click", function(){
		pixel = $(this).text();
		$("#pixel").val(pixel);
		
	});

	$('#test').on("click", function(){
		$('#test').hide();
	});




	$('#enviar').on("click", function(){
		
		$.post( "xhr.php", { pais: $('#pais').val(), url:$('#lp').val(), ad:$('#ad').val()}).done(function( data ) {
		result = data;
		console.log(result);
		_.each(data, function(itm){
				
			var template = _.template($("#tplpixel").html(),  {'pixel':itm.texto_pixel,"ad":itm.idagencia, "tipo":itm.tipo_pixel});


			$("#success").append(template);
		});

		});	
	});	

	$('#montar').on('click', function(){
		htmlpx="";
		peticiones ="";
		pixel = $("#pixel").val();
		
		urls = $("#urls_test").val();
		
		urls = (urls.split('\n')).join('<br>');
		urls = urls.split('<br>');
		//console.log(urls.length+"URLS:"+urls[1]+" ---->>>"+ urls[0]);		
		
		$("#urls_montadas").html("");
		for(i=0; i < urls.length;i++)
		{
			console.log(i+"--->-->"+urls[i]);
			px = montarPixel(urls[i], pixel);
			htmlpx+="<p>'"+px+"',</p>";
			peticiones += px+" ";
		}
		
		$("#urls_montadas").html(htmlpx);
		$("#peticiones").val(peticiones);
		$("#test").show();
		
	});




});
