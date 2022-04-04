<?php 

?>

<h2>Contactez nous</h2>

<div id="contact">
    <div class="infos">
        <h3>Téléphone:</h3>
            <p>04.05.06.07.08</p>
        <h3>E-Mail:</h3>
            <p>popculture@gmail.com</p>
        <h3>Adresse:</h3>
            <p>8 Rue d'Hozier, 13002 Marseille</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.4568521818514!2d5.367844315759511!3d43.304694982913745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9c0eb8146c2d1%3A0xb2df496224e0aafe!2s8%20Rue%20d&#39;hozier%2C%2013002%20Marseille!5e0!3m2!1sfr!2sfr!4v1646664519235!5m2!1sfr!2sfr" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="formu">
        <h1>Formulaire</h1>
            <form method="post" action="">
                <input type="text" name="prenom" placeholder=" Prénom" required/>
                <br></br>
                <input type="text" name="nom" placeholder=" Nom" required/>
                <br></br>
                <input type="email" name="mail" placeholder=" E-mail" required/>
                <br></br>
                <input type="text" name="objet" placeholder=" Objet"/>
                <br></br>
                <textarea name="message"  rows="5" cols="33" placeholder=" Message" required></textarea>
                <br></br>
                <input type="submit" name="send" value="Envoyer" />
            </form>
    </div>
</div>