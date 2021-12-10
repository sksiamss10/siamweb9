<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
  </head>
  <body>
    <?php
        $conn = new mysqli("localhost", "root", "", "ajax_form");
        $sql = "SELECT * FROM `form_data` ORDER BY id DESC ";
        $result = $conn->query($sql);
    ?>
    <form action="/login">
      <div class="segment">
        <h1>Sign In</h1>
      </div>
      <label>
        <input type="text" placeholder="Username" name="username"/>
      </label>
      <label>
        <input type="password" placeholder="Password" name="password"/>
      </label>
      <div class="input-group">
        <label>
          <input type="email" placeholder="Email Address" name="email"/>
        </label>
      </div>
      <br>
      <button class="red" type="submit">
        <i class="icon ion-md-lock"></i> Log in 
      </button>
    </form>
    <br>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($row = $result->fetch_object()){ ?>
                <tr>
                    <td><?php echo "$row->ID"?></td>
                    <td><?php echo "$row->Name"?></td>
                    <td><?php echo "$row->Password"?></td>
                    <td><?php echo "$row->Email"?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $("form").submit((e)=>{
                e.preventDefault();
                $.ajax({
                    url:"./insert.php",
                    method:"POST",
                    data:$("form").serializeArray(),
                    dataType:"json",
                    success:(data)=>{
                        $txt = '<tr><td>'+data.ID+'</td><td>'+data.username+'</td><td>'+data.password+'</td><td>'+data.email+'</td></tr>';
                        $("tbody").prepend($txt);
                    }
                });
            });
        });
    </script>
  </body>
</html>