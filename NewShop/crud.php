<html>
<body>
    <h1>เพิ่มเข้าข้อมูลสินค้า</h1><br>

    <form action="crud-add.php" method="post" enctype="multipart/form-data">
        <dir>
            <label>Add images</label><br>
            <input type="file" name="ProductPicture" required><br>
        </dir>
        <dir>
            <label>Product Name *</label><br>
            <input type="text" name="ProductName" required><br>
        </dir>
        <dir>
            <label>Description * </label><br>
            <input type="text" name="ProductDescription" required><br>
        </dir>


        <dir>
            <label>ไซส์ *</label><br>
            <select name="ProductSize" id="ProductSize" required >
                <option value="">    </option>
                <option value="S">  S  </option>
                <option value="M">  M  </option>
                <option value="L">  L  </option>
                <option value="XL">  XL  </option>
            </select>
            
        </dir>
        <dir>
            <label>ประเภท *</label><br>
                <select name="ProductType" id="ProductType" required >
                    <option value="">    </option>
                    <option value="S"> เสื้อ - Shirt </option>
                    <option value="M"> กางเกง - Pants </option>
                    <option value="L"> เสื้อแขนยาว - hoodie </option>
                </select>
        </dir>
        <dir>
            <label>เพศ *</label><br>
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
        </dir>


</body>
</html>