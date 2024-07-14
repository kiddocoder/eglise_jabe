<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apdate call</title>
	<link rel="shortcut icon" href="../../images/images/add.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/add_match.css">

	<!-- link jqeury -->
	<script src="../../assets/js/jquery.min.js"></script>
    <style>
        fieldset
        {
            width: 80%;
    padding: 10px;
    border: 1px solid #f1f1f1;
    background: transparent;
    box-shadow: 0 0 20px 0 rgba(0,0,0,0.2px) ,0 5px 5px 0 rgba(0,0,0,0.24);
    border-radius: 10px;
        }
        form{
    width: 90%;
    padding: 10px;
    border: 1px solid #f1f1f1;
    background: transparent;
    box-shadow: 0 0 20px 0 rgba(0,0,0,0.2px) ,0 5px 5px 0 rgba(0,0,0,0.24);
    border-radius: 10px;
    background-color: #f1f1f1;


}

input[type=text],input[type=password],input[type=email],input[type=number]{
    width: 45%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 10px;
    list-style: none;


}
input[type=submit]{
    background-color: darkblue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 85%;
    border-radius: 10px;
    
}

    </style>
  </head>
  <body>
  <div class="container">

   <center><fieldset>
    <legend>
        
            <h2>Update call</h2>
        
        </legend>
        <form action="../save/save_student.php" method="POST">
            <div class="user_details">
                <div class="input_box">
					<!-- Home team -->
				    <label for="name">Abaje</label>
					<input type="text" name="name" id="name" class="form-control" required>
                    
					<!-- Away team -->
					<label for="pname">Abashitsi</label>
					<input type="text" name="surname" id="pname" class="form-control" required>
                </div>
                <div class="input_box">
                    <label for="school">ISHURE</label>
                 <input type="number" name="schoolID"  value="<?php echo $school_name; ?>">
                </div>
                <div class="input_box">
                    <label for="telephone">:</label>
                    <input type="number" name="telephone" placehorder="+257 68 38 16 02">
                    <label for="commune">Commune</label>
                    <input type="text" name="commune" id="com" required>
					<label for="qua">Quartier</label>
                    <input type="text" name="qua" id="qua" required>
                </div>
                <div class="input_box">
				    <label for="av">Avenue</label>
                    <input type="text" name="av" id="av"required>
					<label for="numav">No Avenue</label>
                    <input type="text" name="numav" id="numav"required>
                </div>
            </div>
            <div class="reg_btn">
            <input type="submit" value="Ajouter l'élève" name="save">
            </div>
        </form>
        </fieldset></center>
    </div> 
  </body>
  </html>