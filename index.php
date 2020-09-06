<head>
        <title>hotal Menu</title>
         
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	 
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
       <style>
           
           .jumbotron{
               height: 100px;
               padding-top: 20px;
               border-radius: 0px; 
               background-color: MediumSeaGreen;
            }
            .container{
                align-items: center;
                justify-content: center; 
                padding: 40px 40px;
            }
            #table{
                display:none;
            }
            .cont{
                padding-top: 30px;
                text-align: center;
            }
            
                footer{
                position: fixed;
                left: 0;
                bottom: 0px;
                width: 100%;
                background-color:black;
                text-align: center;
                }
                
                
       </style>
    </head>
    <body>
        <div class="jumbotron text-center"><h1 style="color: white;">hotal Menu</h1></div>
       
        <div class="cont">
            <h1>Select items from menu to view details</h1>
          </div>
          
          <div class="container">
            <select name="item hotal-dropdown hotal" class="custom-select custom-select-lg mb-3" id="hotal">
              <option value="">Select Menu Items</option>
          </select>
          <br>
        
          <table id="table" class="table table-hover">
            <tr>
              <th>Name</th>
              <td id="menuname"></td>
            </tr>
            <tr>
              <th>ID</th>
              <td id="id"></td>
            </tr>
            <tr>
              <th>Short Name</th>
              <td id="sname"></td>
            </tr>
            <tr>
              <th>Description</th>
              <td id="descp"></td>
            </tr>
            <tr>
              <th>Price Small</th>
              <td id="psmall"></td>
            </tr>
            <tr>
              <th>Price Large</th>
              <td id="plarge"></td>
            </tr>
          </table>
        
      
          </div>
        
       
        
        
        <footer>
            <!-- <div class="footer1">
                <div class="container-fluid"> -->
                    <p style="color: white;">&copy; Copyright 2016</p>
                    <a href="mailto:foodrestro@gmail.com">foodrestro@gmail.com</a></p>
                    <!-- </div>
              </div> -->
        </footer>
            
        <script src="jquery-3.5.1.min.js"></script>
    
	<script>
        let base_url = "restaurant.php";
        
	$("document").ready(function(){
            getRestaurantMenuList();
            document.querySelector("#restaurant").addEventListener("change",getMenuItemList);
        });
        function getRestaurantMenuList() {
            let url = base_url + "?req=menu_name_list";
            $.get(url,function(data,success){
              console.log(data)
                for (const key in data) {
                let opt = document.createElement("option");
                opt.textContent = data[key].name;
                opt.value = data[key].name; 
                document.querySelector('#restaurant').appendChild(opt);
            }
            });
        }
        
            function getMenuItemList(i)
            {
                
                let index=i.target.value;
                
                console.log(index);
                let url=base_url + "?req=menuName&name="+index;
                $.get(url,function(data,success){
                    
                        
                        if(data != null){
                        let x = data;
                        let pricesmall = x.price_small;
                        
                        if(pricesmall == null){
                            pricesmall = "Not available";
                        }
                        let descrp = x.description;
                        if(descrp == ""){
                            descrp = "Description not available";
                        }
                         
                        document.querySelector("#menuname").textContent = x.name;
                        document.querySelector("#id").textContent = x.id;
                        document.querySelector("#sname").textContent = x.short_name;
                        document.querySelector("#descp").textContent = descrp;
                        document.querySelector("#psmall").textContent = pricesmall;
                        document.querySelector("#plarge").textContent = x.price_large;
                         
                    }
                    document.getElementById("table").style.display = "block";
                });
                
            }
</script>
        
    </body>
</html>