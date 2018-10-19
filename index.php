<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.bootcss.com/bulma/0.7.2/css/bulma.min.css" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <?php
include 'config.php';
?>
  <div class="container is-widescreen">
    <div class="notification">
      <section class="hero is-medium is-primary is-bold">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              <?php
echo "Remote File Downloader"
?>
            </h1>
            <h2 class="subtitle">
              <?php
$reminder = shell_exec("df -lh | grep $disk | awk '{print $4}'");
echo "<p>Download link to your file server!<p>";
echo "<p>Reminder <b>" . $reminder . "</b></p>";
?>
            </h2>
          </div>
        </div>
      </section>
    </div>
    <form action="src/post.php" method="post">
      <div class="field">
              <label class="label">Link</label>
              <div class="control">
                <input class="input" type="text" name="link" placeholder="Text input">
              </div>
            </div>

      <div class="field">
              <label class="label">Dir</label>
              <div class="control">
                <input class="input" type="text" name="dir" placeholder="Text input">
              </div>
            </div>

            <div class="field is-grouped has-text-centered">
              <div class="control">
                <input type="submit" class="button is-link" value="Download"></input>
              </div>
            </div>
    </form>
    <br />
    <br />
    <form action="src/upload.php" method="POST" enctype="multipart/form-data">
      <div class="box has-text-centered">
      <div class="field is-grouped">
      <div class="file">
        <label class="file-label">
          <input class="file-input" type="file" name="files[]" id="filexx" multiple="multiple">
          <span class="file-cta">
            <span class="file-icon">
              <i class="fas fa-upload"></i>
            </span>
            <span class="file-label">
              Choose a file…
            </span>
          </span>
        </label>
      </div>
              &emsp;
              <label class="label">Dir</label>
              <div class="control">
                <input class="input" type="text" name="dir" placeholder="Text input">
              </div>
              &emsp;
              <div class="control">
                <input type="submit" class="button is-link" placeholder="Upload" value="Upload"></input>
              </div>
        </div>
        <div class="field">
          <div class="container is-centered is-boxed has-text-centered">
            <label class="label">File Lists</label>
            <ol id="filename">
            </ol>
          </div>
        </div>
      </div>
    </form>
  </div>
  <footer class="footer">
  <div class="content has-text-centered">
    <p>
      &copyright <strong>Deng Qi</strong>
    </p>
  </div>
</footer>
  <script>
    var file = document.getElementById("filexx");
    file.onchange = function(){
          var files = file.files;
          if(files.length > 0)
          {
            var fileNames = [];
            for(var i =0 ; i< files.length; i++){
              console.log(files[i].name);
              fileNames.push("<li>" + files[i].name + "</li>");
            }
            document.getElementById('filename').innerHTML = fileNames.join("\n");
          }
      };
  </script>
</body>

</html>