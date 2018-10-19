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

            <!-- <div class="field">
              <label class="label">Username</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="Text input" value="bulma">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
                <span class="icon is-small is-right">
                  <i class="fas fa-check"></i>
                </span>
              </div>
              <p class="help is-success">This username is available</p>
            </div>

            <div class="field">
              <label class="label">Email</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                  <i class="fas fa-exclamation-triangle"></i>
                </span>
              </div>
              <p class="help is-danger">This email is invalid</p>
            </div> -->

            <!-- <div class="field">
              <label class="label">Subject</label>
              <div class="control">
                <div class="select">
                  <select>
                    <option>Select dropdown</option>
                    <option>With options</option>
                  </select>
                </div>
              </div>
            </div> -->

            <!-- <div class="field">
              <label class="label">Message</label>
              <div class="control">
                <textarea class="textarea" placeholder="Textarea"></textarea>
              </div>
            </div>

            <div class="field">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                </label>
              </div>
            </div>

            <div class="field">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="question"> Yes
                </label>
                <label class="radio">
                  <input type="radio" name="question"> No
                </label>
              </div>
            </div> -->

            <div class="field is-grouped">
              <div class="control">
                <input type="submit" class="button is-link" ></input>
              </div>
              <div class="control">
                <button class="button is-text">Cancel</button>
              </div>
            </div>
    </form>
  </div>
</body>

</html>