<!-- on va créer un element comme ça on a juste à le call dans le layout -->
<section>
	<script>
		function suggest(element, table, field){
    	var is_ie = ((navigator.userAgent.toLowerCase().indexOf("msie") != -1) && (navigator.userAgent.toLowerCase().indexOf("opera") == -1));
 
	    //Fonction utile servant à retourner la position absolue d'un élément
    	findPos = function(obj){
        	var curleft = curtop = 0;
        	if (obj.offsetParent) {
            	curleft = obj.offsetLeft
            	curtop = obj.offsetTop
            	while (obj = obj.offsetParent) {
               		curleft += obj.offsetLeft
                	curtop += obj.offsetTop
            	}
        	}
        	return [curleft,curtop];
    	}  
    	//Création de la liste des propositions si elle n'existe pas encore
    	if(!document.getElementById('suggestsList')){
        	var suggestsList = document.createElement('ul');
        	suggestsList.id = 'suggestsList';
         
        	var style = (!is_ie ? window.getComputedStyle(element, null) : element.currentStyle);
        	if(style.width){
            	var width = parseInt(style.width.replace(/px/, ''));
         
            	var paddingRight = (style.paddingRight ? style.paddingRight : false);
            	if(paddingRight){
                	paddingRight = parseInt(paddingRight.replace(/px/, ''));
                	width += paddingRight;
            	}
             
            	var paddingLeft = (style.paddingLeft ? style.paddingLeft : false);
            	if(paddingLeft){
                	paddingLeft = parseInt(paddingLeft.replace(/px/, ''));
                	width += paddingLeft;
            	}
             
            	suggestsList.style.width = width+'px';
        	}
         
        	suggestsList.style.position = 'absolute';
        	var coord = findPos(element);
        	suggestsList.style.left = coord[0]+'px';
        	suggestsList.style.top = coord[1]+(19)+'px';
        	document.body.appendChild(suggestsList);
    	}
    	else{
        	suggestsList = document.getElementById('suggestsList');
    	}
    	suggestsList.style.display = 'none';
     
    	closeSuggest = function(nofocus){
        	var todelete = document.createElement('div');
        	todelete.appendChild(suggestsList);
        	if(!nofocus){ element.focus(); }
    	};
     
    	document.body.onkeyup = function(e){
        	var key = (!is_ie ? e.keyCode : window.event.keyCode);
        	if(key == 27){ //touche esc
            	closeSuggest();
        	}
        	else if(key == 9){
            closeSuggest(true);
        	}
    	};
    	document.body.onclick = function(){ closeSuggest(); };
         
    	if(element.value != ''){
        //Récupération de la liste des suggestions     
        	var suggests = new Array();
        
       		var XHR = false;
        	try{        XHR = new ActiveXObject("Microsoft.XMLHTTP");   }    // essayer Internet Explorer
        	catch(e){   XHR = new XMLHttpRequest(); }
 
        	XHR.open("GET", '/dev/autocomplete/autocomplete_ajax.php?table='+table+'&field='+field+'&search='+element.value, true); //timestamp en parametre pour empecher la mise en cache
        // Attente de l'état 4 (-> OK)
        	XHR.onreadystatechange = function () {
            // l'état est à 4, requête reçue
            	if(XHR.readyState == 4){
                	var xml = XHR.responseXML;
                	var suggests_xml = xml.getElementsByTagName('suggest');
                	for(i=0; i<suggests_xml.length; i++){
                    	suggests[suggests.length] = suggests_xml[i].firstChild.data;
                	}
                 
                	//On remplit la liste
                	suggestsList.innerHTML = '';
                	if(suggests.length){
                    	for(i=0; i<suggests.length; i++){
                        	var li = document.createElement('li');
                        	var a = document.createElement('a');
                        	a.innerHTML = suggests[i];
                        	a.onclick = function(){
                            	element.value = this.innerHTML;
                            	closeSuggest();
                        	};
                        	li.appendChild(a);
                        	suggestsList.appendChild(li);
                    	}
                    	suggestsList.style.display = '';
                	}
                	else{
                    	closeSuggest();
                	}
            	}
        	}
       	 XHR.send(null);
    	}
    	else{
    	    closeSuggest();
    	}
	}
	</script>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="section-heading">
						Rechercher un article
					</h2>
					<?php echo $this->Form->create('Post',array('id' => 'textarea', 'type' => 'post','url' => array('controller' => 'posts', 'action' => 'resultSearch'))); ?>
						<div class="input-group">
							<?php echo $this->Form->input('search', array('label'=>"",'id'=>'search', 'class'=>'form-control')); ?>
								<span class="input-group-btn">
									<?php echo $this->Form->button('Rechercher', array('class'=>'btn btn-default')); ?>
								</span>
						</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</section>