<?php
require_once 'includes/item.php';

$art1 = new Item("images/art1.jpg", "Fire Pot", "Shallow woodfired bowl of slightly altered shape with flashed colouring. Impressed on base 'YW' and dated c.2012.", "6 cm high and 23 cm in diameter.", 99, "Yuri Weildman", "art");
$art2 = new Item("images/art2.jpg", "Bun Pot", "Very large wood-fired salt-glazed bowl squared off at the rim, with four handles, and rounded at the base. Unmarked but very similar to a salt-glazed 'bun bowl' illustrated in Pottery in Australia, 15/2, 1976.", "19 cm high and 34 cm in diameter.", 89, "John Edye", "art");
$art3 = new Item("images/art3.jpg", "Noodle Pot", "Vase of squat baluster shape with rich brown stoneware body and glaze-over-glaze and resist decoration in shades of golden brown, tan and black. Painted on base 'Daly', with the GD impressed mark and dating from the late 1970s / early 1980s.", "9 cm high and 11 cm in diameter.", 109, "Greg Daley", "art");
$art4 = new Item("images/art4.jpg", "Shallow Bowl", "Stoneware jug with high looped handle and luscious tenmoku glaze. Unmarked and dating from the 1970s.", "21 cm high and 14 cm in diameter.", 96, "Veronica Isaac", "art");
$art5 = new Item("images/art5.jpg", "Rice Ball", "Well-thrown stoneware jar with oxide-spotted pale brown glaze and unglazed rim. Impressed on base 'Barham', and dating after 1976.", "16 cm high and 13 cm in diameter.", 210, "Jacinta Soo", "art");
$art6 = new Item("images/art6.jpg", "Green Tea Cup", "Goose-neck white stoneware bowl with rounded body, teal glaze and monochrome bands of hatched decoration. Painted on base 'D.Ibrihim'.", "13.5 cm high and 13 cm in diameter.", 209, "Delrise Ibrihim", "art");
$art7 = new Item("images/art7.jpg", "Sauce Bowl", "Round-bodied stoneware carafe with band of ridged lines on shoulder and tenmoku glaze. Impressed on side near base with the Edinburgh Pottery Ballarat stamp.", "21 cm high and 12 cm in diameter.", 179, "Eddison Wir", "art");
$art8 = new Item("images/art8.jpg", "Sake Holder", "Handsome raku vase with rounded body and conical neck, matt charcoal in colour with swirling ivory bands of decoration. Incised on base 'JB'.", "27 cm high and 15 cm in diameter.", 303, "Janey Bennet", "art");
$home1 = new Item("images/home1.jpg", "Bowl set 1", "Set of six mugs, each made of white slip which shows as a narrow footring, and glazed a textured dark brown on the outside and a glossy burnt orange on the base and inside. Three incised on base 'Hanstaad', three with a printed underglaze stamp, all dating from the 1970s.", "9 cm high and 9 cm in diameter.", 102, "Hanstaad", "home");
$home2 = new Item("images/home2.jpg", "Bowl Amore", "Six white stoneware mugs with blue glaze and hand-painted flowers. Impressed to base 'RM' and dating from the 1990s.", "Each 8.5 cm high and 8 cm in diameter.", 69, "Cherryl, Jacobs", "home");
$home3 = new Item("images/home3.jpg", "Tea set 1", "Tall cylindrical decanter with cream and grey speckled glaze on white body, and six matching goblets of large size. Each piece impressed on the front with Derek Smith's BF Blackfriars Pottery seal and dating from 1976-1984.", "Carafe 32 cm high and 9.5 cm in diameter. Goblets 12 cm high and 7.5 cm in diameter.", 126, "Blackfriars", "home");
$home4 = new Item("images/home4.jpg", "Tea set 2", "Stoneware wine set consisting of a port jug with cork stopper and four cups with tan glaze and sgraffito decoration. The jug is unmarked, the cups are impressed on side near base 'Yarra Glen Pottery Naturally' and date from the 1980s.", "Jug 23 cm high, 14.5 cm wide and 11 cm deep; cups 6 cm high and 6 cm in diameter.", 225, "Yarra Glen", "home");
$home5 = new Item("images/home5.jpg", "Bowl set 2", "White stoneware milk jug and sugar bowl with pale olive green glaze inside and around the upper body and finely speckled dark gray glaze with geometric tenmoku resist decoration. Impressed on unglazed foot ring 'LMCD' and dating from the 1980s / 1990s.", "Each 11 cm high and 10 cm in diameter.", 109, "Lynne McDowell", "home");
$home6 = new Item("images/home6.jpg", "Bowl set 3", "Lidded sugar bowl and matching creamer, both with a squat form and matt brown marbled glaze with opal coloured highlights. The Jug is has printed 'Freida Cooper' and 'Australia Raw Opal' stamps. The sugar bowl just has a printed 'Girraweer Pottery' stamp.", "Sugar bowl: 9cm high and 10cm in diameter; jug: 9cm high and 9cm in diameter.", 97, "Freida Cooper", "home");
$home7 = new Item("images/home7.jpg", "Man on Moon", "Pair of pale grey stoneware goblets glazed a very pale umber with dark umber overglaze and resist decoration. Incised on base C.S. Marked CS '75.", "14 cm high and 9 cm in diameter.", 79, "Chris Sanders", "home");
$home8 = new Item("images/home8.jpg", "Tribal set", "Set of four slender goblets with high-gloss pale glaze and hand-painted decoration. Unmarked but designed by Rudolf Dybka, with a Natural Decor paper label, and dating from the first half of the 1980s.", "14 cm high and 7.5 cm in diameter.", 133, "Natural Decor", "home");

$items = [$art1, $art2, $art3, $art4, $art5, $art6, $art7, $art8, $home1, $home2, $home3, $home4, $home5, $home6, $home7, $home8];
?>
<div>
    <h1 class="admin_text">&lt PREVIEW &gt</h1><h3 class="admin_text">&nbsp&nbspFunctionalities not yet implemented</h3>
</div>
<table class='table  table-sm'>
    <caption><h3>Catalogue</h3></caption>
	<thead>
		<th>Photo</th>
        <th>Name</th>
        <th>Category</th>
        <th>Ceramist</th>
        <th>Price</th>
        <th>
            <a class="admin-table-button button-add" href="#">Add New</a>
        </th>
    </thead>
    <tbody id='tbody'>

<?php

foreach($items as $item) {
    echo "
        <tr>
			<td><img src=".$item->img." width='50px' heigth='auto' class='image-responsive'></td>
            <td style='padding-top: 1.5em'>".$item->name."</td>
            <td style='padding-top: 1.5em'>".$item->category."</td>
            <td style='padding-top: 1.5em'>$item->ceramist</td>
            <td style='padding-top: 1.5em'>$item->price</td>
            <td style='padding-top: 1.5em'>
			<div>
                <div class='oblique-button'><a class='admin-table-button button-update' href='#'>Update</a></div>
                <div class='oblique-button'><a class='admin-table-button button-delete' href='#'>Delete</a></div>
            </div>
            </td>
        </tr>
    ";
}
?>
    </tbody>
</table>