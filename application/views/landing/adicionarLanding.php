
<html>

    <head>
        <script src='https://www.google.com/recaptcha/api.js?render=6Lfl9fUUAAAAAJXx8wjghR0QW8aPU9-92fLxno1D'></script>
    </head>

    <body>
        <script>
            grecaptcha.ready(function () {
                grecaptcha.execute('6Lfl9fUUAAAAAJXx8wjghR0QW8aPU9-92fLxno1D', {
                    action: 'action_name'
                });
            });
        </script>

        <form action="<?php echo base_url() ?>index.php/landing/storepet" method="post">
            <input type="text" name="name" placeholder="Your name" required>
            <input type="email" name="email" placeholder="Your email address" required>
            <textarea name="message" placeholder="Type your message here...." required></textarea>

            <input type="submit" name="submit" value="SUBMIT">

        </form>

    </body>

</html>