<template>
    <section class="contact" id="contact">
        
        <div class="container">
            <div class="head">
                <small>Keep In Touch</small>
                <h2>
                    Contact <span>Us</span>
                </h2>
            </div>
            <div class="row">
                <div class="col-md-8" data-aos="fade-right data-aos-easing=" ease-in-sine>
                    <form class="contact-form" action="" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Enter Message"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Enter Your Name">
                            </div>

                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Enter Your Email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" >
                                <input class="form-control" type="text" placeholder="Enter Your Subject">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"> Send </button>
                        
                    </form>
                </div>
                <div class="col-md-3" data-aos="fade-right" data-aos-easing="ease-in-sine">
                    <div class="contact-info">
                        <i class="fa fa-house"></i>
                        <p> Holly St, . <small> Denver, CO 80222 </small> </p>
                        
                    </div>

                    <div class="contact-info">
                        <i class="fa fa-envelope"></i>
                        <p> tuti@tutigrill.com <small>  </small> </p>
                        
                    </div>

                    <div class="contact-info">
                        <i class="fa fa-location"></i>
                        <p> Holly St, . <small> Denver, CO 80222 </small> </p>
                        
                    </div>
                </div>
            </div>
        </div>

    </section>
</template>

<script>
export default {
    name: 'contact-section',
    mounted(){}
}
</script>
