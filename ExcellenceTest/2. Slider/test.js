function slider(container, nav){
	this.container=container;
	this.nav=nav.hide();
	this.imgs=this.container.find('.slides'); 
    console.log('Value of this.imgs is : '+this.imgs);
	this.width=this.imgs[0].width;
	console.log('Value of width is : '+this.width);
	this.imgLen=this.imgs.length;
	this.current=0;
}

slider.prototype.transition=function(coords){
	this.container.animate({
		'margin-left': coords || -(this.current*this.width)
	},500);
};

slider.prototype.setCurrentPos=function(dir){
	var pos=this.current;
	console.log('Value of this.value is : '+dir);
	pos+= ~~(dir=='next') || -1;
	this.current=(pos<0)?this.imgLen-1: pos%(this.imgLen);
	console.log(this.current);
	
};