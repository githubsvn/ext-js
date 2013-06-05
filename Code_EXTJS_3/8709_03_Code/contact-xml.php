<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
echo "<message success=\"true\">";
echo "  <contact>";
echo "    <id>contact1</id>";
echo "    <firstName>Jorge</firstName>";
echo "    <lastName>Ramon</lastName>";
echo "    <company>MiamiCoder</company>";
echo "    <title>Mr</title>";
echo "    <pic>img/jorger.jpg</pic>";
echo "    <email>ramonj@miamicoder.com</email>";
echo "    <webPage>http://www.miamicoder.com</webPage>";
echo "    <imAddress></imAddress>";
echo "    <homePhone></homePhone>";
echo "    <busPhone>555 555-5555</busPhone>";
echo "    <mobPhone></mobPhone>";
echo "    <fax></fax>";
echo "    <bAddress>123 Acme Rd #001 Miami, FL 33133</bAddress>";
echo "    <hAddress></hAddress>";
echo "    <mailingAddress>mailToBAddress</mailingAddress>";
echo "  </contact>";
echo "</message>";

?>