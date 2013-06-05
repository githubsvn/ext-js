<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>";
echo "<ItemSearchResponse xmlns=\"http://webservices.amazon.com/AWSECommerceService/2006-06-28\">";
echo "  <Items>";
echo "    <Request>";
echo "      <IsValid>True</IsValid>";
echo "      <ItemSearchRequest>";
echo "        <Author>Sidney Sheldon</Author>";
echo "        <SearchIndex>Books</SearchIndex>";
echo "      </ItemSearchRequest>";
echo "   </Request>";
echo "    <TotalResults>203</TotalResults>";
echo "    <TotalPages>21</TotalPages>";
echo "    <Item>";
echo "      <ASIN>0446355453</ASIN>";
echo "      <DetailPageURL>http://www.amazon.com/gp/redirect.html%3FASIN=0446355453%26tag=ws%26lcode=xm2%26cID=2025%26ccmID=165953%26location=/o/ASIN/0446355453%253FSubscriptionId=1A7XKHR5BYD0WPJVQEG2</DetailPageURL>";
echo "      <ItemAttributes>";
echo "        <Author>Sidney Sheldon</Author>";
echo "        <Manufacturer>Warner Books</Manufacturer>";
echo "       <ProductGroup>Book</ProductGroup>";
echo "        <Title>Master of the Game</Title>";
echo "      </ItemAttributes>";
echo "    </Item>";
echo "   <Item>";
echo "      <ASIN>0446613657</ASIN>";
echo "      <DetailPageURL>http://www.amazon.com/gp/redirect.html%3FASIN=0446613657%26tag=ws%26lcode=xm2%26cID=2025%26ccmID=165953%26location=/o/ASIN/0446613657%253FSubscriptionId=1A7XKHR5BYD0WPJVQEG2</DetailPageURL>";
echo "      <ItemAttributes>";
echo "        <Author>Sidney Sheldon</Author>";
echo "        <Manufacturer>Warner Books</Manufacturer>";
echo "        <ProductGroup>Book</ProductGroup>";
echo "        <Title>Are You Afraid of the Dark?</Title>";
echo "      </ItemAttributes>";
echo "    </Item>";
echo "  </Items>";
echo "</ItemSearchResponse>";

?>