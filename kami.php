<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Visi, Misi & Profile</title>
    <style>
      body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #add8e6;
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .section-intro {
        text-align: center;
        margin: 20px 0;
        padding: 15px;
        background-color: #f5f5f5;
        border-radius: 10px;
        width: 45%;
        box-shadow: 5px 5px 0px black;
      }

      .section-intro h2 {
        font-size: 28px;
        color: #333;
        margin-bottom: 10px;
        font-weight: bold;
      }

      .section-intro p {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
      }

      .title-box {
        background-color: #f5f5f5;
        color: #333;
        text-align: center;
        padding: 15px 30px;
        margin: 20px 0;
        border-radius: 10px;
        box-shadow: 5px 5px 0px black;
        font-size: 24px;
        font-weight: bold;
        width: 10%;
      }

      .vision-mission-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
        flex-wrap: wrap;
        width: 90%;
      }

      .box {
        background-color: white;
        border: 2px solid black;
        border-radius: 10px;
        box-shadow: 5px 5px 0px black;
        text-align: center;
        padding: 20px;
        flex: 1;
        min-width: 250px;
        max-width: 400px;
      }

      .box h4 {
        font-size: 24px;
        color: #4682b4;
        margin-bottom: 15px;
      }

      .box p,
      .box ul {
        font-size: 16px;
        color: #333;
      }

      .box ul {
        list-style-type: disc;
        margin: 0;
        padding: 0 20px;
        text-align: left;
      }

      .about-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
        flex-wrap: wrap;
        width: 90%;
      }

      .profile {
        background-color: white;
        border: 2px solid black;
        border-radius: 10px;
        box-shadow: 5px 5px 0px black;
        text-align: center;
        padding: 15px;
        width: 220px;
      }

      .profile-pic {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
      }

      .profile h3 {
        font-size: 18px;
        color: #333;
        margin: 5px 0;
      }

      .profile p {
        font-size: 14px;
        margin: 5px 0;
        color: #555;
      }

      .whatsapp-icon {
        width: 25px;
        height: 25px;
      }
    </style>
  </head>
  <body>
    <!-- Section Intro -->
    <div class="section-intro">
      <h2>Jadilah alasan seseorang kembali tersenyum hari ini.</h2>
      <p>
        Senyuman yang kembali terukir mencerminkan harapan, kebahagiaan, dan
        rasa lega dari kebaikan hati Anda. Dengan menjadi alasan di balik
        senyuman itu, Anda tidak hanya memberikan bantuan, tetapi juga harapan
        dan rasa bahwa mereka tidak sendiri.
      </p>
    </div>

    <!-- Judul Visi & Misi -->
    <div class="title-box">Visi & Misi</div>

    <!-- Kontainer Visi & Misi -->
    <section class="vision-mission">
      <div class="vision-mission-container">
        <!-- Kotak Visi -->
        <div class="box visi">
          <h4>Visi</h4>
          <p>
            Menjadi platform terdepan yang cepat dan responsif dalam
            memfasilitasi bantuan darurat serta mempererat solidaritas komunitas.
          </p>
        </div>

        <!-- Kotak Misi -->
        <div class="box misi">
          <h4>Misi</h4>
          <ul>
            <li>
              Menyediakan notifikasi cepat untuk memastikan pengguna segera
              mengetahui kebutuhan darurat di sekitar mereka dan perkembangan
              donasi.
            </li>
            <li>
              Membangun jaringan komunitas yang cepat tanggap dan solid dalam
              memberikan bantuan saat terjadi situasi darurat.
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Judul Profil Tim -->
    <div class="title-box">Profil Tim</div>

    <!-- Kontainer Profil -->
    <div class="about-container">
      <div class="profile">
        <img src="ferdi1.jpg" alt="Profile Picture" class="profile-pic" />
        <h3>Ferdi Nainggolan</h3>
        <p>230840137</p>
        <p>Project Manager</p>
        <a href="https://wa.me/081360866638" target="_blank">
          <img src="wa.png" alt="WhatsApp" class="whatsapp-icon" />
        </a>
      </div>
      <div class="profile">
        <img src="marsel.jpg" alt="Profile Picture" class="profile-pic" />
        <h3>Marsel Yonattan Pasaribu</h3>
        <p>230840154</p>
        <p>Software Analyst</p>
        <a href="https://wa.me/083807137475" target="_blank">
          <img src="wa.png" alt="WhatsApp" class="whatsapp-icon" />
        </a>
      </div>
      <div class="profile">
        <img src="albert.jpg" alt="Profile Picture" class="profile-pic" />
        <h3>Albertus Daeli</h3>
        <p>230840149</p>
        <p>Software Designer</p>
        <a href="https://wa.me/082288939975" target="_blank">
          <img src="wa.png" alt="WhatsApp" class="whatsapp-icon" />
        </a>
      </div>
      <div class="profile">
        <img src="vian.jpg" alt="Profile Picture" class="profile-pic" />
        <h3>Prince Alvian Lase</h3>
        <p>230840143</p>
        <p>Software Developer</p>
        <a href="https://wa.me/085366712772" target="_blank">
          <img src="wa.png" alt="WhatsApp" class="whatsapp-icon" />
        </a>
      </div>
      <div class="profile">
        <img
          src="/ZEBUA.COM/register_pengguna/uploads/111.jpg"
          alt="Profile Picture"
          class="profile-pic"
        />
        <h3>Putra Setiaman Zebua</h3>
        <p>230840125</p>
        <p>Software Designer & Software Developer</p>
        <a href="https://wa.me/082369472343" target="_blank">
          <img src="wa.png" alt="WhatsApp" class="whatsapp-icon" />
        </a>
      </div>
    </div>
  </body>
</html>
