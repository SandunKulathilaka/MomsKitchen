<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Footer</title>
   <style>
      .footer {
         background-color: #222222;
         color: white;
         padding: 1rem 0;
         text-align: center;
      }

      .grid {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
         gap: 1rem;
         align-items: center;
         justify-content: center;
      }

      .boxx {
         border: 1px solid #ccc;
         padding: 1.5rem;
         text-align: center;
         background-color: grey;
         height: 170px;
      }

      .boxx img {
         height: 7rem;
         width: auto;
         margin-bottom: .5rem;
      }

      .boxx h3 {
         margin: 1rem 0;
         font-size: 1.5rem;
         color: white;
         text-transform: capitalize;
      }

      .boxx p,
      .boxx a {
         font-size: 1.2rem;
         color: white;
         line-height: 1.5;
         text-decoration: none;
      }

      .credit {
         font-size: 1.2rem;
         color: white;
         margin-top: 1rem;
      }

      .loader {
         display: none;
         text-align: center;
      }
   </style>
</head>
<body>

<footer class="footer">

   <section class="grid">

      <div class="boxx">
         <img src="images/email-icon.png" alt="">
         <h3>Mail Us</h3>
         <a href="momskitchen@gmail.com">momskitchen@gmail.com</a>
      </div>

      <div class="boxx">
         <img src="images/clock-icon.png" alt="">
         <h3>Bussiness Hours</h3>
         <p>10:00am to 08:00pm</p>
      </div>

      <div class="boxx">
         <img src="images/map-icon.png" alt="">
         <h3>Restaurant Location</h3>
         <a href="#">Colombo, Sri Lanka</a>
      </div>

      <div class="boxx">
         <img src="images/phone-icon.png" alt="">
         <h3>Hotline</h3>
         <a href="tel:1234567890">123-456-7890</a>
      </div>

   </section>

   <div class="credit">&copy; <?= date('Y'); ?> <span>Mom's Kitchen</span></div>

</footer>

<div class="loader">
   <img src="images/loader.gif" alt="">
</div>

</body>
</html>
