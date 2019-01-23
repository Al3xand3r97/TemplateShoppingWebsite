<?php
session_start();
if(!isset($_SESSION['admin_username'])){
    include 'header.php';
} else {
    include 'owner_check.php';
}
?>
<body style="background-color:#B0C4DE">
    <div class="container" >
        <div class="col-12 jumbotron" style="background-color: #E6E6FA;border-style: double; border-radius: 5px;"">
            <p class="text-center"><h1>About</h1></p>
            <hr style="height: 12px;border: 0;box-shadow: inset 0 12px 12px -12px">
              <p>  Lorem ipsum dolor sit amet, est cu enim veri diceret. Dignissim expetendis pri ne, mea ea modus nonumes oportere. His an aliquid laboramus disputando, vel ne clita iuvaret moderatius. Mei ea tale altera labores, stet nibh illum an duo, eruditi signiferumque ei qui.

                Eu purto essent docendi mei, eu scaevola scriptorem nam. Adhuc verear cu eos, no pro graeci civibus petentium. Ne eam vocent mnesarchum vituperata, verear aperiri impedit at eum. Vis ut movet accommodare, quo eu lucilius constituam contentiones. Mel tacimates comprehensam cu, atomorum conceptam in mei. Sed ei nullam copiosae torquatos, odio iusto veniam et pro.

                Eu usu appareat vulputate. Nam an soleat pertinax laboramus. Nonumy utamur prodesset in sit, ne est sumo esse prodesset, ad mei adipisci delicata efficiantur. Eos partem posidonium ne, eius numquam hendrerit qui ne.

                Essent audiam comprehensam at his, in movet quando vivendo his. Eius meis melius duo at, cu nec regione interesset temporibus. Libris suscipiantur vel ea, placerat sententiae ea mea, id explicari molestiae interesset est. Est te idque intellegebat, te pri dolor ornatus laboramus.
</p>
        </div>
    </div>

<?php
include 'footer.php';
?>