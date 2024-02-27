<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="CSS_UI.css">
<body>
    <div >
        <h1>ADD PRODUCT</h1><br>
    </div>
    <dir>
        <form action="crud-add.php" method="post" enctype="multipart/form-data">
            <dir >
                <label for="add">Add images</label><br>
                <input type="file" id="add" name="ProductPicture" accept="picture/*" onchange="previewImage(event)" required><br>
                <img width="300" id="imagePreview" >
            </dir>
            <script>
                function previewImage(event) {
                var reader = new FileReader();
        
                reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                };
        
                reader.readAsDataURL(event.target.files[0]);
                }
            </script>
            <dir>
                <label>Product Name *</label><br>
                <input type="text" name="ProductName" required><br>
            </dir>
            <dir>
                <label>Description * </label><br>
                <input type="text" name="ProductDescription" required><br>
            </dir>


            <dir>
                <label>ไซส์ *</label>
                <select name="ProductSize" id="ProductSize" required >
                    <option value="">    </option>
                    <option value="S">  S  </option>
                    <option value="M">  M  </option>
                    <option value="L">  L  </option>
                    <option value="XL">  XL  </option>
                </select>
                
            </dir>
            <dir>
                <label>ประเภท *</label>
                    <select name="ProductType" id="ProductType" required >
                        <option value="">    </option>
                        <option value="Shirt"> เสื้อ - Shirt </option>
                        <option value="Pants"> กางเกง - Pants </option>
                        <option value="hoodie"> เสื้อแขนยาว - hoodie </option>
                    </select>
            </dir>
            <dir>
                <label>เพศ *</label>
                    <select name="ProductGender" id="ProductGender" required >
                        <option value="">    </option>
                        <option value="M"> Men </option>
                        <option value="W"> Women   </option>
                        <option value="K">  Kid  </option>
                    </select>
            </dir>


            <dir>
                <label>Color * </label><br> 
                <input type="text" name="ProductColor" required><br>
            </dir>
            <dir>
                <label>Price * </label><br> 
                <input type="text" name="ProductPrice" required><br>
            </dir>
            <dir>
                <label>Unit * </label><br> 
                <input type="text" name="ProductUnit" required><br>
            </dir>
            <dir>
                <input type="submit" name="submit" value="บันทึก" required>
                <?php
                    echo "<input type='button' value='ย้อนกลับ' onclick='javascript:window.history.back()'>";
                ?>
            </dir>
    </dir>

    


</body>
</html>