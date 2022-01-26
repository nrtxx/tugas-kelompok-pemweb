<?php
    include 'header.php';
?>

<main>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6" style="padding: 100px">
                    <h2 class="section-heading">Contact Us</h2>
                </div>

                <div class="col-md-6" style="padding: 30px;">
                    <form method="post">
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" id="name"
                                required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label>Email :</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label>Subject :</label>
                            <input type="text" name="subject" class="form-control" placeholder="Enter subject"
                                id="subject" required data-validation-required-message="Please enter your subject.">
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="form-group">
                            <label>Message :</label>
                            <textarea class="form-control" name="message" placeholder="Enter your message" rows="5"
                                id="message" required
                                data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center mb-5">
                            <div id="success"></div>
                            <button type="submit" name="sendMessage" class="btn btn-primary">Send Message</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

<?php
    include 'footer.php';
?>