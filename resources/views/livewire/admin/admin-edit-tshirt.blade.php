<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Static Tee Designer</title>
        <style>
            .drawing-area{
                position: absolute;
                top: 60px;
                left: 122px;
                z-index: 10;
                width: 200px;
                height: 400px;
            }

            .canvas-container{
                width: 200px; 
                height: 400px; 
                position: relative; 
                user-select: none;
            }

            #tshirt-div{
                width: 452px;
                height: 548px;
                position: relative;
                background-color: #fff;
            }

            #canvas{
                position: absolute;
                width: 200px;
                height: 400px; 
                left: 0px; 
                top: 0px; 
                user-select: none; 
                cursor: default;
            }
        </style>
    </head>
    <body>
        <!-- Create the container of the tool -->
        <div id="tshirt-div">
            <!-- 
                Initially, the image will have the background tshirt that has transparency
                So we can simply update the color with CSS or JavaScript dinamically
            -->
            <img id="tshirt-backgroundpicture" src="{{asset('assets/images/bg-t-shirt-black.png')}}"/>

            <div id="drawingArea" class="drawing-area">					
                <div class="canvas-container">
                    <canvas id="tshirt-canvas" width="200" height="400"></canvas>
                </div>
            </div>
        </div>
        
        <!-- The select that will allow the user to pick one of the static designs -->
        <br>
        <label for="tshirt-design">T-Shirt Design:</label>
        <select id="tshirt-design">
            <option value="">Select one of our designs ...</option>
            <option value="{{asset('assets/images/t-shirtLogo-copy.png')}}">Batman</option>
        </select>

        <!-- The Select that allows the user to change the color of the T-Shirt -->
        <br><br>
        <label for="tshirt-color">T-Shirt Color:</label>
        <select id="tshirt-color">
            <!-- You can add any color with a new option and definings its hex code -->
            <option value="#fff">White</option>
            <option value="#000">Black</option>
            <option value="#f00">Red</option>
            <option value="#008000">Green</option>
            <option value="#ff0">Yellow</option>
        </select>
        
        <!-- Include Fabric.js in the page -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/451/fabric.min.js" integrity="sha512-qeu8RcLnpzoRnEotT3r1CxB17JtHrBqlfSTOm4MQzb7efBdkcL03t343gyRmI6OTUW6iI+hShiysszISQ/IahA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        

        <script>
            let canvas = new fabric.Canvas('tshirt-canvas');

            function updateTshirtImage(imageURL){
                // If the user doesn't pick an option of the select, clear the canvas
                if(!imageURL){
                    canvas.clear();
                }

                // Create a new image that can be used in Fabric with the URL
                fabric.Image.fromURL(imageURL, function(img) {
                    // Define the image as background image of the Canvas
                    canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
                        // Scale the image to the canvas size
                        scaleX: canvas.width / img.width,
                        scaleY: canvas.height / img.height
                    });
                });
            }
            
            // Update the TShirt color according to the selected color by the user
            document.getElementById("tshirt-color").addEventListener("change", function(){
                document.getElementById("tshirt-div").style.backgroundColor = this.value;
            }, false);

            // Update the TShirt color according to the selected color by the user
            document.getElementById("tshirt-design").addEventListener("change", function(){

                // Call the updateTshirtImage method providing as first argument the URL
                // of the image provided by the select
                updateTshirtImage(this.value);
            }, false);
        </script>
    </body>
</html>