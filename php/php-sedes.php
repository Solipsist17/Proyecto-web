
<?php
include("php-sedes-data.php")
?>

<?php
echo '<section class="locales">';
foreach ($locales as $index => $local) {
    $mapaId = 'mapa' . ($index + 1);
    $direccionId = $local['nombre'];
    $telefono = $local['telefono'];
    $mapaUrl = $local['mapa'];

    echo '<div class="card">';
    echo '<iframe class="mapa" id="'.$mapaId.'" src="'.$mapaUrl.'" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
    echo '<div class="card-info">';
    echo '<h2>' . $local['nombre'] . '</h2>';
    echo '<p>Direcciones:</p>';
    echo '<div class="' . strtolower($local['nombre']) . '">';
    echo '<ul>';
    foreach ($local['direccion'] as $indx=>$dir) {

        echo '<li><a class="direccion" href="#' . $direccionId . '" id="'.$indx.'">' . $dir . '</a></li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '<p>Teléfono:</p>';
    echo '<ul>';
    echo '<li>' . $telefono . '</li>';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
}
echo '</section>';
?>
<script>
    const maps = [
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.900190329967!2d-77.03036872593565!3d-12.050387941966145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8b735f71f4b%3A0x954a6fe36048ea30!2sAv.%20Abancay%20451%2C%20Lima%2015001!5e0!3m2!1ses-419!2spe!4v1681771199915!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2760.0580054594298!2d-76.99047095470691!3d-11.952924236282357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c5407d0bd0b1%3A0xee78428f0ac61ed7!2sMz%20F14%2C%20Mz%20F13%20Urb.%20Mariscal%20C%C3%A1ceres%20SJL!5e0!3m2!1ses-419!2spe!4v1684009286249!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.9301228492204!2d-77.03452892565923!3d-12.048328841928376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8b647baaaab%3A0x41874bee39a462fe!2sJr.%20Sta.%20Rosa%20179%2C%20Lima%2015001!5e0!3m2!1ses-419!2spe!4v1684013828337!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.8364824619935!2d-77.04608192565911!3d-12.054769342048367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c522a18fdb%3A0x4f63137c9b66c6e6!2sAv.%20Rep%C3%BAblica%20de%20Venezuela%20681%2C%20Lima%2015082!5e0!3m2!1ses-419!2spe!4v1684014639415!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.952106397762!2d-77.04056962565927!3d-12.046816341900193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c95f19b983%3A0xdc1e21de1ca61e02!2sAv.%20Tacna%20524%2C%20Lima%2015001!5e0!3m2!1ses-419!2spe!4v1684015057919!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.963310057462!2d-77.03542772565925!3d-12.046045441885873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c92c7771f8d7%3A0x6d6a2ec1893df2c8!2sJr.%20Caman%C3%A1%20370%2C%20Lima%2015001!5e0!3m2!1ses-419!2spe!4v1684015307755!5m2!1ses-419!2spe"
];

const maps2 = [
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.9159710257377!2d-75.7288326256094!3d-14.082137483128914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9110e28f4455945b%3A0x8b5020187b3eaa5b!2sAv%20San%20Martin%2010%2C%20Ica%2011001!5e0!3m2!1ses-419!2spe!4v1684017660316!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.062223046555!2d-75.73411552560952!3d-14.073502982940024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9110e293de1b2e0d%3A0x46f70cddba452fb0!2sAv%20Cutervo%20123%2C%20Ica%2011001!5e0!3m2!1ses-419!2spe!4v1684017921353!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.46719216223!2d-75.70443042561024!3d-14.049567082416806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91111d4e2423131f%3A0xcc73243aaa2637c9!2sMiguel%20Grau%20200%2C%20Parcona%2011003!5e0!3m2!1ses-419!2spe!4v1684018448752!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d342.08061977602415!2d-75.72835494572158!3d-14.065339547392385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9110e2bd74fff5a9%3A0xa5f919e54c468d8c!2s2%20de%20Mayo%2C%20Ica%2011001!5e0!3m2!1ses-419!2spe!4v1684019108399!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.51777446978!2d-75.70776772561024!3d-14.046574582351505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91111d5235d1cb91%3A0xc136b3244a80dc02!2sC.%20Lima%20204%2C%20Ica%2011003!5e0!3m2!1ses-419!2spe!4v1684019283399!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.0045271328627!2d-75.73661212560948!3d-14.07690988301455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9110e29263d56e31%3A0x9206d619cfef3501!2sAv.%20Tupac%20Amaru%201336%2C%20Ica%2011001!5e0!3m2!1ses-419!2spe!4v1684019414941!5m2!1ses-419!2spe"
];

const maps3=[
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.6858382446844!2d-79.02483192601723!3d-8.13343108142652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d610d66cf7f%3A0x69a696b832fb742!2sAv.%20Primavera%20101%2C%20V%C3%ADctor%20Larco%20Herrera%2013008!5e0!3m2!1ses-419!2spe!4v1681771677872!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.952719216703!2d-79.0238295288776!3d-8.106296963219657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad16281fed98bf%3A0x62d07ae0d4de1913!2sJir%C3%B3n%20Uni%C3%B3n%20373%2C%20Trujillo%2013006!5e0!3m2!1ses-419!2spe!4v1684019801867!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.6689462983654!2d-79.04792912573737!3d-8.135145481448097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d144da2de0b%3A0x29608013b2b8664d!2sGarcilaso%20de%20la%20Vega%20578%2C%20V%C3%ADctor%20Larco%20Herrera%2013009!5e0!3m2!1ses-419!2spe!4v1684020068019!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3950.0362239810233!2d-79.04215532573794!3d-8.097788380990565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d219cb6bef5%3A0x1fb5d49b3c4ae162!2sLos%20Brillantes%20650%2C%20Trujillo%2013011!5e0!3m2!1ses-419!2spe!4v1684020202356!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.791479392414!2d-79.04216852573752!3d-8.122701181295414!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d7373d58cfd%3A0xdbd2deaf771f1c8a!2sAv.%20Am%C3%A9rica%20Sur%204171%2C%20Trujillo%2013008!5e0!3m2!1ses-419!2spe!4v1684020294252!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.9196378679885!2d-79.03038542573772!3d-8.109665281135772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ad3d8489e587ad%3A0x555b4ad0c916ffe2!2sJir%C3%B3n%20Independencia%20589%2C%20Trujillo%2013001!5e0!3m2!1ses-419!2spe!4v1684020406498!5m2!1ses-419!2spe"
];

const maps4=[
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.5757963304964!2d-71.54200322581623!3d-16.39555783804326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424a5afcbdf18f%3A0x6b6dbb44b4e2d34b!2sAv%20La%20Marina%20531%2C%20Arequipa%2004001!5e0!3m2!1ses-419!2spe!4v1681771861785!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.8276900953924!2d-71.5320379278981!3d-16.433575304296895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424ad8e441574d%3A0x4786bc8e024d5f97!2sJos%C3%A9%20Olaya%20106%2C%20Arequipa%2004009!5e0!3m2!1ses-419!2spe!4v1684023759490!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d620.4769363662558!2d-71.56586001908059!3d-16.3930547578965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424a71265c148b%3A0xc64ea3140ccbaeb9!2sMz%20D%2C%20Cerro%20Colorado%2004014!5e0!3m2!1ses-419!2spe!4v1684023964897!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.978956581338!2d-71.56186062554569!3d-16.375034337519242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424a10345aaa15%3A0xea82c31dde5b723c!2s28%20de%20Julio%20113%2C%20Cerro%20Colorado%2004014!5e0!3m2!1ses-419!2spe!4v1684024143435!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3829.0634753082772!2d-71.60482165875612!3d-16.31970063329495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x914237b34b2383af%3A0x203d1492c298923d!2sA.h%20la%20Alborada%2C%20Arequipa%2004016!5e0!3m2!1ses-419!2spe!4v1684024652830!5m2!1ses-419!2spe",
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.6193192758496!2d-71.53177072554514!3d-16.39334343798722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424a526c890df3%3A0xcac6783ad7b68c59!2sEl%20Filtro%20501%2C%20Arequipa%2004001!5e0!3m2!1ses-419!2spe!4v1684024840975!5m2!1ses-419!2spe" 
];
const addresslinks = document.querySelectorAll(".direccion");

addresslinks.forEach((link) => {
    link.addEventListener("click", (event) => {
        event.preventDefault();
        const index = parseInt(link.id);
        const clase = link.parentNode.parentNode.parentNode.classList[0];

        if (clase == "lima") {
            document.querySelector("#mapa1").setAttribute("src", maps[index]);
        } 
        if (clase == "ica") {
            document.querySelector("#mapa2").setAttribute("src", maps2[index]);
        } 
        if (clase == "trujillo") {
            document.querySelector("#mapa3").setAttribute("src", maps3[index]);
        } 
        if (clase == "arequipa") {
            document.querySelector("#mapa4").setAttribute("src", maps4[index]);
        } 
        
        console.log("indice: " + index);
        console.log("clase: " + clase);
    });
});
</script>