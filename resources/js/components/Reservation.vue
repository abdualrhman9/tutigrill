<template>
    <section class="reservation" id="reservation">

            <div class="container">
                <div class="head" data-aos="fade-up">
                    <small>Make reservation</small>
                    <h2>
                        Book <span> Table</span>
                    </h2>
                    <p>
                        Making a reservation at Tuti Grill restaurant is easy and takes just a
                        couple of minutes.
                    </p>
                </div>
                <div class="row" data-aos="fade-down">
                    <div class="col-md-12">
                        <form action="">
                            <div class="row">

                                

                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="name" placeholder="Your Name">
                                </div>

                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" placeholder="Your Email">
                                </div>

                                <div class="col-md-12">
                                    <input class="form-control" type="number" name="pepole" placeholder="Number of pepole" min="2" max="20">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Enter Message"></textarea>
                                </div>

                                <button class="btn btn-primary"> Submit </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
</template>
<script>
    export default {
        name: 'reservation'
    }
</script>