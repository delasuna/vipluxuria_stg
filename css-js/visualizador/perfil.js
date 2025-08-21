var imageLoader = document.getElementById("imgLoader");
var objFoto = document.getElementById("fotoPerfil");
var colunaFoto = document.getElementById("colunaFoto");

function loadFoto(img) {
	hide(objFoto);
	colunaFoto.className = "colunaFotoH";
	display(imageLoader);

	new ImagePreloader([arrImg[img]], onPreload);
	objFoto.src = arrImg[img];
	arrImgs = document.getElementsByTagName("img");
	for(i in arrImgs) {
		if(!arrImgs[i].id) continue;
		if(arrImgs[i].id.match("thumb")) {
			arrImgs[i].parentNode.parentNode.className = "thumbPerfil";
		}
	}
	flagPrimeira = true;
	document.getElementById("thumb"+img).parentNode.parentNode.className = "thumbPerfilOver";
}

function onPreload(img) {
	var img = img[0];
	var H = img.height;
	var W = img.width

	objFoto.src = img.src;
	objFoto.height = H;
	objFoto.width = W;
	hide(imageLoader);

	if(W == "667")
		colunaFoto.className = "colunaFotoH";
	else
		colunaFoto.className = "colunaFotoV";

	display(objFoto);
}

//=============================================================================

// Image Preloader
function ImagePreloader(images,callback) {
	// store the callback
	this.callback = callback;
	// initialize internal state.
	this.nLoaded = 0;
	this.nProcessed = 0;
	this.aImages = new Array;

	// record the number of images.
	this.nImages = images.length;
	// for each image, call preload()
	for ( var i = 0; i < images.length; i++ )
		this.preload(images[i]);
}

ImagePreloader.prototype.preload = function(image) {
	// create new Image object and add to array
	var oImage = new Image;
	this.aImages.push(oImage);

	// set up event handlers for the Image object
	oImage.onload = ImagePreloader.prototype.onload;
	oImage.onerror = ImagePreloader.prototype.onerror;
	oImage.onabort = ImagePreloader.prototype.onabort;

	// assign pointer back to this.
	oImage.oImagePreloader = this;
	oImage.bLoaded = false;
	oImage.source = image;

	// assign the .src property of the Image object
	oImage.src = image;
}


ImagePreloader.prototype.onComplete = function() {
	this.nProcessed++;
	if ( this.nProcessed == this.nImages )
		this.callback(this.aImages);
}

ImagePreloader.prototype.onload = function() {
	this.bLoaded = true;
	this.oImagePreloader.nLoaded++;
	this.oImagePreloader.onComplete();
}

ImagePreloader.prototype.onerror = function() {
	this.bError = true;
	this.oImagePreloader.onComplete();
}

ImagePreloader.prototype.onabort = function(){
	this.bAbort = true;
	this.oImagePreloader.onComplete();
}

$(document).ready(function()
{
/*	$("#link_exclusiva").click(function()
	{
		$("#thumb_exclusiva").each(function(){
			alert(this.src);
		});
		return false;
	});*/
});