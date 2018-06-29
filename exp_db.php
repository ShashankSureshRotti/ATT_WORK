<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$star="";
$star=$_POST["formvar"];

$file="./json.json";
$write=$star;
file_put_contents($file, $write);
//echo $write;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "att";

$conn1 = mysqli_connect($servername, $username, $password ,$dbname);

// Check connection
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
echo "</br>";

$jsondata=file_get_contents('json.json');
//echo $jsondata;
$data=json_decode($jsondata,true);
$sz=sizeof($data);
echo "</br>";
echo $sz;
echo "</br>";

$pmodata_keys=[];
$pmodata_port1=[];
$pmodata_port2=[];
$pmodata_port3=[];
$pmodata_port4=[];
$pmodata_port5=[];
$pmodata_port6=[];
$pmodata_port7=[];
$pmodata_port8=[];
$pmodata_port9=[];
$pmodata_port10=[];

$pmodata_kv_port1=[];
$pmodata_kv_port2=[];
$pmodata_kv_port3=[];
$pmodata_kv_port4=[];
$pmodata_kv_port5=[];
$pmodata_kv_port6=[];
$pmodata_kv_port7=[];
$pmodata_kv_port8=[];
$pmodata_kv_port9=[];
$pmodata_kv_port10=[];


for($i=0;$i<$sz;$i++){
	$pmodata_keys[$i]=$data[$i]['Complete Section 1 : Customer Contact and Account Detail'];
	if(!empty($data[$i]['<-- Open and complete section'])){
		$pmodata_port1[$i]=$data[$i]['<-- Open and complete section'];
		$pmodata_kv_port1[$pmodata_keys[$i]]=$pmodata_port1[$i];
	}
	if(!empty($data[$i]['<-- Open and complete section_2'])){
		$pmodata_port2[$i]=$data[$i]['<-- Open and complete section_1'];
		$pmodata_kv_port2[$pmodata_keys[$i]]=$pmodata_port2[$i];
	}
	if(!empty($data[$i]['<-- Open and complete section_2'])){
		$pmodata_port3[$i]=$data[$i]['<-- Open and complete section_2'];
		$pmodata_kv_port3[$pmodata_keys[$i]]=$pmodata_port3[$i];
	}
	if(!empty($data[$i]['<-- Open and complete section_3'])){
		$pmodata_port4[$i]=$data[$i]['<-- Open and complete section_3'];
		$pmodata_kv_port4[$pmodata_keys[$i]]=$pmodata_port4[$i];
	}
	if(!empty($data[$i]['<-- Open and complete section_4'])){
		$pmodata_port5[$i]=$data[$i]['<-- Open and complete section_4'];
		$pmodata_kv_port5[$pmodata_keys[$i]]=$pmodata_port5[$i];
	}
	if(!empty($data[$i]['<-- Open and complete section_5'])){
		$pmodata_port6[$i]=$data[$i]['<-- Open and complete section_5'];
		$pmodata_kv_port6[$pmodata_keys[$i]]=$pmodata_port6[$i];
	}
	if(!empty($data[$i]['<-- Open and complete section_6'])){
		$pmodata_port7[$i]=$data[$i]['<-- Open and complete section_6'];
		$pmodata_kv_port7[$pmodata_keys[$i]]=$pmodata_port7[$i];
	}
	if(!empty($data[$i]['<-- Open and complete section_7'])){
		$pmodata_port8[$i]=$data[$i]['<-- Open and complete section_7'];
		$pmodata_kv_port8[$pmodata_keys[$i]]=$pmodata_port8[$i];
	}
	if(!empty($data[$i]['<-- Open and complete section_8'])){
		$pmodata_port9[$i]=$data[$i]['<-- Open and complete section_8'];
		$pmodata_kv_port9[$pmodata_keys[$i]]=$pmodata_port9[$i];
	}
	if(!empty($data[$i]['<-- Open and complete section_9'])){
		$pmodata_port10[$i]=$data[$i]['<-- Open and complete section_9'];
		$pmodata_kv_port10[$pmodata_keys[$i]]=$pmodata_port10[$i];
	}
	
	
}

$sz1=sizeof($pmodata_kv_port1);
foreach ($pmodata_kv_port1 as $key => $value) {
 echo $key." : ".$value;
 echo "</br>";
}
	


	

if(isset($pmodata_kv_port1['Authorizing Customer Business Billing Name'])&&isset($pmodata_kv_port1['City'])&&isset($pmodata_kv_port1['Customer Contact Request Originator'])&&isset($pmodata_kv_port1['Country code'])){
	$site=$pmodata_kv_port1['City'].",".$pmodata_kv_port1['Country code'];
	//echo $site;

	$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port1['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port1['Port MCN']}', '{$pmodata_kv_port1['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port1['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Created the table";
				echo "</br>";
			} else {
				echo "Error";
			}

	
$sql= "INSERT INTO `{$pmodata_kv_port1['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port1['Authorizing Customer Business Billing Name']}', '', '', '{$site}', '{$pmodata_kv_port1['Country code']}', '{$pmodata_kv_port1['Port MCN']}',
 '{$pmodata_kv_port1['Port GRC']}', '{$pmodata_kv_port1['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port1['VPN Name']}', '{$pmodata_kv_port1['VPN MCN']}', '{$pmodata_kv_port1['VPN GRC']}',
 '{$pmodata_kv_port1['VPN Connection Policy']}', '', '{$pmodata_kv_port1['CIR of ePVC / VLAN']}', '{$pmodata_kv_port1['Complex Class of Service?']}',
 '{$pmodata_kv_port1['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port1['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port1['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port1['ASN Override?']}', '', '{$pmodata_kv_port1['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port1['BFD LAN Option']}', '{$pmodata_kv_port1['IPv4 CMTU']}',
 '{$pmodata_kv_port1['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port1['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port1['Cascaded Access Provider']}', '{$pmodata_kv_port1['Head End Jack Type']}',
 '{$pmodata_kv_port1['Head End CPE Interface']}', '{$pmodata_kv_port1['Connection Type']}', '{$pmodata_kv_port1['Port Technology/Type']}',
 '{$pmodata_kv_port1['Port Speed']}', '{$pmodata_kv_port1['Access Speed']}', '', '{$pmodata_kv_port1['Class of Service (COS) Package']}', '{$pmodata_kv_port1['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port1['AT&T VPN Diversity Option']}', '{$pmodata_kv_port1['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port1['Netflow']}', '{$pmodata_kv_port1['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port1['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port1['CSU Vendor']}',
 '{$pmodata_kv_port1['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port1['Street Address/Location']}', '{$pmodata_kv_port1['City']}', '', '{$pmodata_kv_port1['Country code']}',
 '{$pmodata_kv_port1['Postal or ZIP Code']}', '{$pmodata_kv_port1['Site Alias Name']}',
 '{$pmodata_kv_port1['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port1['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port1['Customer Technical Contact Email Address']}', '{$pmodata_kv_port1['Customer Contact Request Originator']}',
 '{$pmodata_kv_port1['Customer Contact Phone #']}', '{$pmodata_kv_port1['Customer Contact Email Address']}', '{$pmodata_kv_port1['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port1['Customer Billing Contact Phone #']}', '{$pmodata_kv_port1['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port1['Customer Purchase Decision Date']}', '{$pmodata_kv_port1['Customer Requested Due Date']}',
 '{$pmodata_kv_port1['Use Best Available Due Date?']}', '{$pmodata_kv_port1['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port1['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
				echo "</br>";
			} else {
				echo "Error";
				echo "</br>";
			}
     
}
echo "</br>";


if(isset($pmodata_kv_port2['Authorizing Customer Business Billing Name'])&&isset($pmodata_kv_port2['City'])&&isset($pmodata_kv_port2['Customer Contact Request Originator'])&&isset($pmodata_kv_port2['Country code'])&&isset($pmodata_kv_port2['Customer Technical Contact'])){
	$site1=$pmodata_kv_port2['City'].",".$pmodata_kv_port2['Country code'];
	echo "This is site for port2";
	echo "</br>";
	echo $site;
	echo "</br>";
    echo "This is inside port2";
	
	$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port2['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port2['Port MCN']}', '{$pmodata_kv_port2['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port2['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Inserted";
			} else {
				echo "Error";
			}
	
$sql= "INSERT INTO `{$pmodata_kv_port2['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port2['Authorizing Customer Business Billing Name']}', '', '', '{$site1}', '{$pmodata_kv_port2['Country code']}', '{$pmodata_kv_port2['Port MCN']}',
 '{$pmodata_kv_port2['Port GRC']}', '{$pmodata_kv_port2['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port2['VPN Name']}', '{$pmodata_kv_port2['VPN MCN']}', '{$pmodata_kv_port2['VPN GRC']}',
 '{$pmodata_kv_port2['VPN Connection Policy']}', '', '{$pmodata_kv_port2['CIR of ePVC / VLAN']}', '{$pmodata_kv_port2['Complex Class of Service?']}',
 '{$pmodata_kv_port2['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port2['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port2['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port2['ASN Override?']}', '', '{$pmodata_kv_port2['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port2['BFD LAN Option']}', '{$pmodata_kv_port2['IPv4 CMTU']}',
 '{$pmodata_kv_port2['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port2['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port2['Cascaded Access Provider']}', '{$pmodata_kv_port2['Head End Jack Type']}',
 '{$pmodata_kv_port2['Head End CPE Interface']}', '{$pmodata_kv_port2['Connection Type']}', '{$pmodata_kv_port2['Port Technology/Type']}',
 '{$pmodata_kv_port2['Port Speed']}', '{$pmodata_kv_port2['Access Speed']}', '', '{$pmodata_kv_port2['Class of Service (COS) Package']}', '{$pmodata_kv_port2['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port2['AT&T VPN Diversity Option']}', '{$pmodata_kv_port2['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port2['Netflow']}', '{$pmodata_kv_port2['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port2['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port2['CSU Vendor']}',
 '{$pmodata_kv_port2['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port2['Street Address/Location']}', '{$pmodata_kv_port2['City']}', '', '{$pmodata_kv_port2['Country code']}',
 '{$pmodata_kv_port2['Postal or ZIP Code']}', '{$pmodata_kv_port2['Site Alias Name']}',
 '{$pmodata_kv_port2['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port2['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port2['Customer Technical Contact Email Address']}', '{$pmodata_kv_port2['Customer Contact Request Originator']}',
 '{$pmodata_kv_port2['Customer Contact Phone #']}', '{$pmodata_kv_port2['Customer Contact Email Address']}', '{$pmodata_kv_port2['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port2['Customer Billing Contact Phone #']}', '{$pmodata_kv_port2['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port2['Customer Purchase Decision Date']}', '{$pmodata_kv_port2['Customer Requested Due Date']}',
 '{$pmodata_kv_port2['Use Best Available Due Date?']}', '{$pmodata_kv_port2['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port2['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
			} else {
				echo "Error";
			}
		
}

if(isset($pmodata_kv_port3['Authorizing Customer Business Billing Name'])&&isset($pmodata_kv_port3['Customer Technical Contact'])&&isset($pmodata_kv_port3['City'])&& isset($pmodata_kv_port1['Customer Contact Request Originator'])&&isset($pmodata_kv_port2['State'])&&isset($pmodata_kv_port3['Country code'])){
	$site3=$pmodata_kv_port3['City'].",".$pmodata_kv_port3['Country code'];
	//echo $site;

	$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port3['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port3['Port MCN']}', '{$pmodata_kv_port3['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port3['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Inserted";
			} else {
				echo "Error";
			}
	
	
$sql= "INSERT INTO `{$pmodata_kv_port3['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port3['Authorizing Customer Business Billing Name']}', '', '', '{$site3}', '{$pmodata_kv_port3['Country code']}', '{$pmodata_kv_port3['Port MCN']}',
 '{$pmodata_kv_port3['Port GRC']}', '{$pmodata_kv_port3['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port3['VPN Name']}', '{$pmodata_kv_port3['VPN MCN']}', '{$pmodata_kv_port3['VPN GRC']}',
 '{$pmodata_kv_port3['VPN Connection Policy']}', '', '{$pmodata_kv_port3['CIR of ePVC / VLAN']}', '{$pmodata_kv_port3['Complex Class of Service?']}',
 '{$pmodata_kv_port3['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port3['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port3['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port3['ASN Override?']}', '', '{$pmodata_kv_port3['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port3['BFD LAN Option']}', '{$pmodata_kv_port3['IPv4 CMTU']}',
 '{$pmodata_kv_port3['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port3['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port3['Cascaded Access Provider']}', '{$pmodata_kv_port3['Head End Jack Type']}',
 '{$pmodata_kv_port3['Head End CPE Interface']}', '{$pmodata_kv_port3['Connection Type']}', '{$pmodata_kv_port3['Port Technology/Type']}',
 '{$pmodata_kv_port3['Port Speed']}', '{$pmodata_kv_port3['Access Speed']}', '', '{$pmodata_kv_port3['Class of Service (COS) Package']}', '{$pmodata_kv_port3['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port3['AT&T VPN Diversity Option']}', '{$pmodata_kv_port3['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port3['Netflow']}', '{$pmodata_kv_port3['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port3['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port3['CSU Vendor']}',
 '{$pmodata_kv_port3['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port3['Street Address/Location']}', '{$pmodata_kv_port3['City']}', '', '{$pmodata_kv_port3['Country code']}',
 '{$pmodata_kv_port3['Postal or ZIP Code']}', '{$pmodata_kv_port3['Site Alias Name']}',
 '{$pmodata_kv_port3['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port3['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port3['Customer Technical Contact Email Address']}', '{$pmodata_kv_port3['Customer Contact Request Originator']}',
 '{$pmodata_kv_port3['Customer Contact Phone #']}', '{$pmodata_kv_port3['Customer Contact Email Address']}', '{$pmodata_kv_port3['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port3['Customer Billing Contact Phone #']}', '{$pmodata_kv_port3['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port3['Customer Purchase Decision Date']}', '{$pmodata_kv_port3['Customer Requested Due Date']}',
 '{$pmodata_kv_port3['Use Best Available Due Date?']}', '{$pmodata_kv_port3['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port3['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
			} else {
				echo "Error";
			}

}
if(isset($pmodata_kv_port4['Authorizing Customer Business Billing Name']) &&isset($pmodata_kv_port4['Customer Technical Contact'])&& isset($pmodata_kv_port4['City'])&& isset($pmodata_kv_port4['Customer Contact Request Originator'])&&isset($pmodata_kv_port2['State'])&& isset($pmodata_kv_port4['Country code'])){
	$site4=$pmodata_kv_port4['City'].",".$pmodata_kv_port4['Country code'];
	//echo $site;

	$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port4['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port4['Port MCN']}', '{$pmodata_kv_port4['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port4['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Inserted";
			} else {
				echo "Error";
			}
	
	
$sql= "INSERT INTO `{$pmodata_kv_port4['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port4['Authorizing Customer Business Billing Name']}', '', '', '{$site4}', '{$pmodata_kv_port4['Country code']}', '{$pmodata_kv_port4['Port MCN']}',
 '{$pmodata_kv_port4['Port GRC']}', '{$pmodata_kv_port4['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port4['VPN Name']}', '{$pmodata_kv_port4['VPN MCN']}', '{$pmodata_kv_port4['VPN GRC']}',
 '{$pmodata_kv_port4['VPN Connection Policy']}', '', '{$pmodata_kv_port4['CIR of ePVC / VLAN']}', '{$pmodata_kv_port4['Complex Class of Service?']}',
 '{$pmodata_kv_port4['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port4['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port4['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port4['ASN Override?']}', '', '{$pmodata_kv_port4['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port4['BFD LAN Option']}', '{$pmodata_kv_port4['IPv4 CMTU']}',
 '{$pmodata_kv_port4['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port4['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port4['Cascaded Access Provider']}', '{$pmodata_kv_port4['Head End Jack Type']}',
 '{$pmodata_kv_port4['Head End CPE Interface']}', '{$pmodata_kv_port4['Connection Type']}', '{$pmodata_kv_port4['Port Technology/Type']}',
 '{$pmodata_kv_port4['Port Speed']}', '{$pmodata_kv_port4['Access Speed']}', '', '{$pmodata_kv_port4['Class of Service (COS) Package']}', '{$pmodata_kv_port4['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port4['AT&T VPN Diversity Option']}', '{$pmodata_kv_port4['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port4['Netflow']}', '{$pmodata_kv_port4['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port4['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port4['CSU Vendor']}',
 '{$pmodata_kv_port4['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port4['Street Address/Location']}', '{$pmodata_kv_port4['City']}', '', '{$pmodata_kv_port4['Country code']}',
 '{$pmodata_kv_port4['Postal or ZIP Code']}', '{$pmodata_kv_port4['Site Alias Name']}',
 '{$pmodata_kv_port4['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port4['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port4['Customer Technical Contact Email Address']}', '{$pmodata_kv_port4['Customer Contact Request Originator']}',
 '{$pmodata_kv_port4['Customer Contact Phone #']}', '{$pmodata_kv_port4['Customer Contact Email Address']}', '{$pmodata_kv_port4['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port4['Customer Billing Contact Phone #']}', '{$pmodata_kv_port4['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port4['Customer Purchase Decision Date']}', '{$pmodata_kv_port4['Customer Requested Due Date']}',
 '{$pmodata_kv_port4['Use Best Available Due Date?']}', '{$pmodata_kv_port4['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port4['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
			} else {
				echo "Error";
			}

}

if(isset($pmodata_kv_port5['Authorizing Customer Business Billing Name'])&&isset($pmodata_kv_port5['Customer Technical Contact']) && isset($pmodata_kv_port5['City'])&& isset($pmodata_kv_port5['Customer Contact Request Originator'])&&isset($pmodata_kv_port2['State']) && isset($pmodata_kv_port5['Country code'])){
	$site5=$pmodata_kv_port5['City'].",".$pmodata_kv_port5['Country code'];
	//echo $site;

	$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port5['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port5['Port MCN']}', '{$pmodata_kv_port5['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port5['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Inserted";
			} else {
				echo "Error";
			}
	
	
$sql= "INSERT INTO `{$pmodata_kv_port5['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port5['Authorizing Customer Business Billing Name']}', '', '', '{$site5}', '{$pmodata_kv_port5['Country code']}', '{$pmodata_kv_port5['Port MCN']}',
 '{$pmodata_kv_port5['Port GRC']}', '{$pmodata_kv_port5['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port5['VPN Name']}', '{$pmodata_kv_port5['VPN MCN']}', '{$pmodata_kv_port5['VPN GRC']}',
 '{$pmodata_kv_port5['VPN Connection Policy']}', '', '{$pmodata_kv_port5['CIR of ePVC / VLAN']}', '{$pmodata_kv_port5['Complex Class of Service?']}',
 '{$pmodata_kv_port5['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port5['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port5['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port5['ASN Override?']}', '', '{$pmodata_kv_port5['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port5['BFD LAN Option']}', '{$pmodata_kv_port5['IPv4 CMTU']}',
 '{$pmodata_kv_port5['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port5['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port5['Cascaded Access Provider']}', '{$pmodata_kv_port5['Head End Jack Type']}',
 '{$pmodata_kv_port5['Head End CPE Interface']}', '{$pmodata_kv_port5['Connection Type']}', '{$pmodata_kv_port5['Port Technology/Type']}',
 '{$pmodata_kv_port5['Port Speed']}', '{$pmodata_kv_port5['Access Speed']}', '', '{$pmodata_kv_port5['Class of Service (COS) Package']}', '{$pmodata_kv_port5['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port5['AT&T VPN Diversity Option']}', '{$pmodata_kv_port5['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port5['Netflow']}', '{$pmodata_kv_port5['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port5['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port5['CSU Vendor']}',
 '{$pmodata_kv_port5['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port5['Street Address/Location']}', '{$pmodata_kv_port5['City']}', '', '{$pmodata_kv_port5['Country code']}',
 '{$pmodata_kv_port5['Postal or ZIP Code']}', '{$pmodata_kv_port5['Site Alias Name']}',
 '{$pmodata_kv_port5['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port5['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port5['Customer Technical Contact Email Address']}', '{$pmodata_kv_port5['Customer Contact Request Originator']}',
 '{$pmodata_kv_port5['Customer Contact Phone #']}', '{$pmodata_kv_port5['Customer Contact Email Address']}', '{$pmodata_kv_port5['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port5['Customer Billing Contact Phone #']}', '{$pmodata_kv_port5['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port5['Customer Purchase Decision Date']}', '{$pmodata_kv_port5['Customer Requested Due Date']}',
 '{$pmodata_kv_port5['Use Best Available Due Date?']}', '{$pmodata_kv_port5['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port5['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
			} else {
				echo "Error";
			}

}

if(isset($pmodata_kv_port6['Authorizing Customer Business Billing Name']) &&isset($pmodata_kv_port6['Customer Technical Contact'])&& isset($pmodata_kv_port6['City'])&& isset($pmodata_kv_port6['Customer Contact Request Originator'])&&isset($pmodata_kv_port2['State'])&& isset($pmodata_kv_port6['Country code'])){
	$site6=$pmodata_kv_port6['City'].",".$pmodata_kv_port6['Country code'];
	//echo $site;

	$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port6['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port6['Port MCN']}', '{$pmodata_kv_port6['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port6['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Inserted";
			} else {
				echo "Error";
			}
	
	
$sql= "INSERT INTO `{$pmodata_kv_port6['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port6['Authorizing Customer Business Billing Name']}', '', '', '{$site6}', '{$pmodata_kv_port6['Country code']}', '{$pmodata_kv_port6['Port MCN']}',
 '{$pmodata_kv_port6['Port GRC']}', '{$pmodata_kv_port6['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port6['VPN Name']}', '{$pmodata_kv_port6['VPN MCN']}', '{$pmodata_kv_port6['VPN GRC']}',
 '{$pmodata_kv_port6['VPN Connection Policy']}', '', '{$pmodata_kv_port6['CIR of ePVC / VLAN']}', '{$pmodata_kv_port6['Complex Class of Service?']}',
 '{$pmodata_kv_port6['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port6['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port6['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port6['ASN Override?']}', '', '{$pmodata_kv_port6['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port6['BFD LAN Option']}', '{$pmodata_kv_port6['IPv4 CMTU']}',
 '{$pmodata_kv_port6['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port6['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port6['Cascaded Access Provider']}', '{$pmodata_kv_port6['Head End Jack Type']}',
 '{$pmodata_kv_port6['Head End CPE Interface']}', '{$pmodata_kv_port6['Connection Type']}', '{$pmodata_kv_port6['Port Technology/Type']}',
 '{$pmodata_kv_port6['Port Speed']}', '{$pmodata_kv_port6['Access Speed']}', '', '{$pmodata_kv_port6['Class of Service (COS) Package']}', '{$pmodata_kv_port6['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port6['AT&T VPN Diversity Option']}', '{$pmodata_kv_port6['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port6['Netflow']}', '{$pmodata_kv_port6['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port6['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port6['CSU Vendor']}',
 '{$pmodata_kv_port6['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port6['Street Address/Location']}', '{$pmodata_kv_port6['City']}', '', '{$pmodata_kv_port6['Country code']}',
 '{$pmodata_kv_port6['Postal or ZIP Code']}', '{$pmodata_kv_port6['Site Alias Name']}',
 '{$pmodata_kv_port6['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port6['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port6['Customer Technical Contact Email Address']}', '{$pmodata_kv_port6['Customer Contact Request Originator']}',
 '{$pmodata_kv_port6['Customer Contact Phone #']}', '{$pmodata_kv_port6['Customer Contact Email Address']}', '{$pmodata_kv_port6['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port6['Customer Billing Contact Phone #']}', '{$pmodata_kv_port6['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port6['Customer Purchase Decision Date']}', '{$pmodata_kv_port6['Customer Requested Due Date']}',
 '{$pmodata_kv_port6['Use Best Available Due Date?']}', '{$pmodata_kv_port6['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port6['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
			} else {
				echo "Error";
			}

}

if(isset($pmodata_kv_port7['Authorizing Customer Business Billing Name']) &&isset($pmodata_kv_port7['Customer Technical Contact'])&& isset($pmodata_kv_port7['City'])&& isset($pmodata_kv_port7['Customer Contact Request Originator'])&&isset($pmodata_kv_port2['State']) && isset($pmodata_kv_port7['Country code'])){
	$site7=$pmodata_kv_port7['City'].", ".$pmodata_kv_port7['Country code'];
	//echo $site;

	$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port7['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port7['Port MCN']}', '{$pmodata_kv_port7['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port7['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Inserted";
			} else {
				echo "Error";
			}
	
	
$sql= "INSERT INTO `{$pmodata_kv_port7['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port7['Authorizing Customer Business Billing Name']}', '', '', '{$site7}', '{$pmodata_kv_port7['Country code']}', '{$pmodata_kv_port7['Port MCN']}',
 '{$pmodata_kv_port7['Port GRC']}', '{$pmodata_kv_port7['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port7['VPN Name']}', '{$pmodata_kv_port7['VPN MCN']}', '{$pmodata_kv_port7['VPN GRC']}',
 '{$pmodata_kv_port7['VPN Connection Policy']}', '', '{$pmodata_kv_port7['CIR of ePVC / VLAN']}', '{$pmodata_kv_port7['Complex Class of Service?']}',
 '{$pmodata_kv_port7['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port7['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port7['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port7['ASN Override?']}', '', '{$pmodata_kv_port7['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port7['BFD LAN Option']}', '{$pmodata_kv_port7['IPv4 CMTU']}',
 '{$pmodata_kv_port7['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port7['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port7['Cascaded Access Provider']}', '{$pmodata_kv_port7['Head End Jack Type']}',
 '{$pmodata_kv_port7['Head End CPE Interface']}', '{$pmodata_kv_port7['Connection Type']}', '{$pmodata_kv_port7['Port Technology/Type']}',
 '{$pmodata_kv_port7['Port Speed']}', '{$pmodata_kv_port7['Access Speed']}', '', '{$pmodata_kv_port7['Class of Service (COS) Package']}', '{$pmodata_kv_port7['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port7['AT&T VPN Diversity Option']}', '{$pmodata_kv_port7['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port7['Netflow']}', '{$pmodata_kv_port7['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port7['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port7['CSU Vendor']}',
 '{$pmodata_kv_port7['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port7['Street Address/Location']}', '{$pmodata_kv_port7['City']}', '', '{$pmodata_kv_port7['Country code']}',
 '{$pmodata_kv_port7['Postal or ZIP Code']}', '{$pmodata_kv_port7['Site Alias Name']}',
 '{$pmodata_kv_port7['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port7['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port7['Customer Technical Contact Email Address']}', '{$pmodata_kv_port7['Customer Contact Request Originator']}',
 '{$pmodata_kv_port7['Customer Contact Phone #']}', '{$pmodata_kv_port7['Customer Contact Email Address']}', '{$pmodata_kv_port7['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port7['Customer Billing Contact Phone #']}', '{$pmodata_kv_port7['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port7['Customer Purchase Decision Date']}', '{$pmodata_kv_port7['Customer Requested Due Date']}',
 '{$pmodata_kv_port7['Use Best Available Due Date?']}', '{$pmodata_kv_port7['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port7['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
			} else {
				echo "Error";
			}


}

if(isset($pmodata_kv_port8['Authorizing Customer Business Billing Name']) &&isset($pmodata_kv_port8['Customer Technical Contact'])&& isset($pmodata_kv_port8['City'])&& isset($pmodata_kv_port8['Customer Contact Request Originator'])&&isset($pmodata_kv_port2['State']) && isset($pmodata_kv_port8['Country code'])){
	$site8=$pmodata_kv_port8['City'].",".$pmodata_kv_port8['Country code'];
	//echo $site;
	$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port8['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port8['Port MCN']}', '{$pmodata_kv_port8['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port8['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Inserted";
			} else {
				echo "Error";
			}
	
	
$sql= "INSERT INTO `{$pmodata_kv_port8['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port8['Authorizing Customer Business Billing Name']}', '', '', '{$site8}', '{$pmodata_kv_port8['Country code']}', '{$pmodata_kv_port8['Port MCN']}',
 '{$pmodata_kv_port8['Port GRC']}', '{$pmodata_kv_port8['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port8['VPN Name']}', '{$pmodata_kv_port8['VPN MCN']}', '{$pmodata_kv_port8['VPN GRC']}',
 '{$pmodata_kv_port8['VPN Connection Policy']}', '', '{$pmodata_kv_port8['CIR of ePVC / VLAN']}', '{$pmodata_kv_port8['Complex Class of Service?']}',
 '{$pmodata_kv_port8['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port8['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port8['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port8['ASN Override?']}', '', '{$pmodata_kv_port8['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port8['BFD LAN Option']}', '{$pmodata_kv_port8['IPv4 CMTU']}',
 '{$pmodata_kv_port8['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port8['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port8['Cascaded Access Provider']}', '{$pmodata_kv_port8['Head End Jack Type']}',
 '{$pmodata_kv_port8['Head End CPE Interface']}', '{$pmodata_kv_port8['Connection Type']}', '{$pmodata_kv_port8['Port Technology/Type']}',
 '{$pmodata_kv_port8['Port Speed']}', '{$pmodata_kv_port8['Access Speed']}', '', '{$pmodata_kv_port8['Class of Service (COS) Package']}', '{$pmodata_kv_port8['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port8['AT&T VPN Diversity Option']}', '{$pmodata_kv_port8['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port8['Netflow']}', '{$pmodata_kv_port8['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port8['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port8['CSU Vendor']}',
 '{$pmodata_kv_port8['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port8['Street Address/Location']}', '{$pmodata_kv_port8['City']}', '', '{$pmodata_kv_port8['Country code']}',
 '{$pmodata_kv_port8['Postal or ZIP Code']}', '{$pmodata_kv_port8['Site Alias Name']}',
 '{$pmodata_kv_port8['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port8['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port8['Customer Technical Contact Email Address']}', '{$pmodata_kv_port8['Customer Contact Request Originator']}',
 '{$pmodata_kv_port8['Customer Contact Phone #']}', '{$pmodata_kv_port8['Customer Contact Email Address']}', '{$pmodata_kv_port8['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port8['Customer Billing Contact Phone #']}', '{$pmodata_kv_port8['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port8['Customer Purchase Decision Date']}', '{$pmodata_kv_port8['Customer Requested Due Date']}',
 '{$pmodata_kv_port8['Use Best Available Due Date?']}', '{$pmodata_kv_port8['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port8['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
			} else {
				echo "Error";
			}



}

if(isset($pmodata_kv_port9['Authorizing Customer Business Billing Name']) &&isset($pmodata_kv_port9['Customer Technical Contact'])&& isset($pmodata_kv_port9['City'])&& isset($pmodata_kv_port9['Customer Contact Request Originator'])&&isset($pmodata_kv_port2['State'])&& isset($pmodata_kv_port9['Country code'])){
	$site9=$pmodata_kv_port9['City'].",".$pmodata_kv_port9['Country code'];
	//echo $site;

	$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port9['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port9['Port MCN']}', '{$pmodata_kv_port9['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port9['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Inserted";
			} else {
				echo "Error";
			}
	
	
$sql= "INSERT INTO `{$pmodata_kv_port9['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port9['Authorizing Customer Business Billing Name']}', '', '', '{$site9}', '{$pmodata_kv_port9['Country code']}', '{$pmodata_kv_port9['Port MCN']}',
 '{$pmodata_kv_port9['Port GRC']}', '{$pmodata_kv_port9['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port9['VPN Name']}', '{$pmodata_kv_port9['VPN MCN']}', '{$pmodata_kv_port9['VPN GRC']}',
 '{$pmodata_kv_port9['VPN Connection Policy']}', '', '{$pmodata_kv_port9['CIR of ePVC / VLAN']}', '{$pmodata_kv_port9['Complex Class of Service?']}',
 '{$pmodata_kv_port9['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port9['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port9['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port9['ASN Override?']}', '', '{$pmodata_kv_port9['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port9['BFD LAN Option']}', '{$pmodata_kv_port9['IPv4 CMTU']}',
 '{$pmodata_kv_port9['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port9['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port9['Cascaded Access Provider']}', '{$pmodata_kv_port9['Head End Jack Type']}',
 '{$pmodata_kv_port9['Head End CPE Interface']}', '{$pmodata_kv_port9['Connection Type']}', '{$pmodata_kv_port9['Port Technology/Type']}',
 '{$pmodata_kv_port9['Port Speed']}', '{$pmodata_kv_port9['Access Speed']}', '', '{$pmodata_kv_port9['Class of Service (COS) Package']}', '{$pmodata_kv_port9['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port9['AT&T VPN Diversity Option']}', '{$pmodata_kv_port9['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port9['Netflow']}', '{$pmodata_kv_port9['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port9['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port9['CSU Vendor']}',
 '{$pmodata_kv_port9['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port9['Street Address/Location']}', '{$pmodata_kv_port9['City']}', '', '{$pmodata_kv_port9['Country code']}',
 '{$pmodata_kv_port9['Postal or ZIP Code']}', '{$pmodata_kv_port9['Site Alias Name']}',
 '{$pmodata_kv_port9['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port9['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port9['Customer Technical Contact Email Address']}', '{$pmodata_kv_port9['Customer Contact Request Originator']}',
 '{$pmodata_kv_port9['Customer Contact Phone #']}', '{$pmodata_kv_port9['Customer Contact Email Address']}', '{$pmodata_kv_port9['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port9['Customer Billing Contact Phone #']}', '{$pmodata_kv_port9['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port9['Customer Purchase Decision Date']}', '{$pmodata_kv_port9['Customer Requested Due Date']}',
 '{$pmodata_kv_port9['Use Best Available Due Date?']}', '{$pmodata_kv_port9['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port9['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
			} else {
				echo "Error";
			}

}

if(isset($pmodata_kv_port10['Authorizing Customer Business Billing Name']) &&isset($pmodata_kv_port10['Customer Technical Contact'])&& isset($pmodata_kv_port10['City'])&& isset($pmodata_kv_port10['Customer Contact Request Originator'])&&isset($pmodata_kv_port2['State']) && isset($pmodata_kv_port10['Country code'])){
	$site10=$pmodata_kv_port10['City'].",".$pmodata_kv_port10['Country code'];
	//echo $site;

$sql12 = "SELECT * FROM dss_cust WHERE MCN = ".$pmodata_kv_port10['Port MCN'];
	//echo $sql12;
		$result1 = mysqli_query($conn1, $sql12);
		$row = mysqli_fetch_assoc($result1);
		//echo $result1;
		echo "</br>";
		//echo $result1;
		print_r($row);

		if(mysqli_num_rows($result1)<=0) {
			$sql11 = "INSERT INTO `dss_cust` (`MCN`, `Cust_Name`) VALUES ('{$pmodata_kv_port10['Port MCN']}', '{$pmodata_kv_port10['Authorizing Customer Business Billing Name']}')";
			mysqli_query($conn1, $sql11);
		}
		

			$query = "CREATE TABLE IF NOT EXISTS `{$pmodata_kv_port10['Port MCN']}` (
			`row_id` int(100) NOT NULL AUTO_INCREMENT,
			`Customer_Name` varchar(255) NOT NULL,
			`Note` varchar(255) NOT NULL,
			`ISR` varchar(255) NOT NULL DEFAULT '',
			`Site` varchar(255) NOT NULL,
			`Region` varchar(255) NOT NULL,
			`MCN` varchar(255) NOT NULL,
			`GRC` varchar(255) NOT NULL,
			`SOC` varchar(255) NOT NULL,
			`Site_ID` varchar(255) NOT NULL,
			`Hostname` varchar(255) NOT NULL,
			`Resiliency` varchar(255) NOT NULL,
			`No_of_LCs` varchar(255) NOT NULL,
			`Loopback0` varchar(255) NOT NULL,
			`WAN_CER` varchar(255) NOT NULL,
			`B2B` varchar(255) NOT NULL,
			`IPv6_Loopback0` varchar(255) NOT NULL,
			`IPv6_WAN_CER` varchar(255) NOT NULL,
			`IPv6_B2B` varchar(255) NOT NULL,
			`VPN_Name` varchar(255) NOT NULL,
			`VPN_MCN` varchar(255) NOT NULL,
			`VPN_GRC` varchar(255) NOT NULL,
			`VPN_Connection_Policy` varchar(255) NOT NULL,
			`DLCI_VPI_VCI` varchar(255) NOT NULL,
			`CIR` varchar(255) NOT NULL,
			`CoS_Type` varchar(255) NOT NULL,
			`CE_CoS_Profile` varchar(255) NOT NULL,
			`CE_CoS_Queuing_Shaping` varchar(255) NOT NULL,
			`CE_CoS_Policing` varchar(255) NOT NULL,
			`PE_Egress_Profile` varchar(255) NOT NULL,
			`PE_Egress_Queuing_Shaping` varchar(255) NOT NULL,
			`RG` varchar(255) NOT NULL,
			`RG_Serving_Site` varchar(255) NOT NULL,
			`ASN` varchar(255) NOT NULL,
			`ASN_Unique` varchar(255) NOT NULL,
			`ASN_Override` varchar(255) NOT NULL,
			`ASN_Prepend_Community` varchar(255) NOT NULL,
			`BFD` varchar(255) NOT NULL,
			`BFD_LAN_Option` varchar(255) NOT NULL,
			`IPv4_CMTU` varchar(255) NOT NULL,
			`IPv6_CMTU` varchar(255) NOT NULL,
			`BVoIP` varchar(255) NOT NULL,
			`BVoIP_Config` varchar(255) NOT NULL,
			`TDM_Card` varchar(255) NOT NULL,
			`Concurrent_Calls` varchar(255) NOT NULL,
			`CUBE_Licenses` varchar(255) NOT NULL,
			`SOR_Site_ID` varchar(255) NOT NULL,
			`Site_Designation` varchar(255) NOT NULL,
			`Others` varchar(255) NOT NULL,
			`Catch_all_COS` varchar(255) NOT NULL,
			`TC` varchar(255) NOT NULL,
			`No_of_Public_IPs` varchar(255) NOT NULL,
			`Existing_Domain` varchar(255) NOT NULL,
			`Domain_URL` varchar(255) NOT NULL,
			`DNS_Provider` varchar(255) NOT NULL,
			`Cascaded` varchar(255) NOT NULL,
			`Head_End` varchar(255) NOT NULL,
			`HE_Interface` varchar(255) NOT NULL,
			`Connection_Type` varchar(255) NOT NULL,
			`Port_Type` varchar(255) NOT NULL,
			`Port_Speed` varchar(255) NOT NULL,
			`Access_Speed` varchar(255) NOT NULL,
			`Electrical_Interface` varchar(255) NOT NULL,
			`COS_Package` varchar(255) NOT NULL,
			`COS_Mode` varchar(255) NOT NULL,
			`Port_Level_COS` varchar(255) NOT NULL,
			`Token` varchar(255) NOT NULL,
			`NNI` varchar(255) NOT NULL,
			`PMTU` varchar(255) NOT NULL,
			`Diversity_Option` varchar(255) NOT NULL,
			`Package_Type` varchar(255) NOT NULL,
			`Chassis` varchar(255) NOT NULL,
			`Memory` varchar(255) NOT NULL,
			`IOS` varchar(255) NOT NULL,
			`Licenses` varchar(255) NOT NULL,
			`PVDMs` varchar(255) NOT NULL,
			`Cards` varchar(255) NOT NULL,
			`Other_Items` varchar(255) NOT NULL,
			`Cables` varchar(255) NOT NULL,
			`BIB_Add_Ons` varchar(255) NOT NULL,
			`NetFlow` varchar(255) NOT NULL,
			`IP_Address_Handling` varchar(255) NOT NULL,
			`Installation_Option` varchar(255) NOT NULL,
			`Maintenance_Option` varchar(255) NOT NULL,
			`Migration_Option` varchar(255) NOT NULL,
			`Anira_as_OOB` varchar(255) NOT NULL,
			`WOOB` varchar(255) NOT NULL,
			`Enh_Reporting` varchar(255) NOT NULL,
			`CSU_Vendor` varchar(255) NOT NULL,
			`External_CSU_Model` varchar(255) NOT NULL,
			`CSU_LAN_IP` varchar(255) NOT NULL,
			`CSU_LAN_Mask` varchar(255) NOT NULL,
			`Probe_IP` varchar(255) NOT NULL,
			`Address` varchar(255) NOT NULL,
			`City` varchar(255) NOT NULL,
			`State` varchar(255) NOT NULL,
			`Country` varchar(255) NOT NULL,
			`Postal_Code` varchar(255) NOT NULL,
			`Alias` varchar(255) NOT NULL,
			`Technical_Contact_Name` varchar(255) NOT NULL,
			`Technical_Contact_Phone` varchar(255) NOT NULL,
			`Technical_Contact_Email` varchar(255) NOT NULL,
			`Request_Originator_Name` varchar(255) NOT NULL,
			`Request_Originator_Phone` varchar(255) NOT NULL,
			`Request_Originator_Email` varchar(255) NOT NULL,
			`Billing_Contact_Name` varchar(255) NOT NULL,
			`Billing_Contact_Phone` varchar(255) NOT NULL,
			`Billing_Contact_Email` varchar(255) NOT NULL,
			`Customer_Purchase_Decision_Date` varchar(255) NOT NULL,
			`Customer_Requested_Due_Date` varchar(255) NOT NULL,
			`Best_Available_Due_Date` varchar(255) NOT NULL,
			`Refuse_Early_Service_Activation` varchar(255) NOT NULL,
			`AD_Hostname` varchar(255) NOT NULL,
			`AD_Loopback` varchar(255) NOT NULL,
			`AD_Package_Type` varchar(255) NOT NULL,
			`AD_IOS` varchar(255) NOT NULL,
			`RDS_Filename` varchar(255) NOT NULL,
			`RDS_Notes` varchar(255) NOT NULL,
			`LAN_1_IP` varchar(255) NOT NULL,
			`LAN_1_Virtual_IP` varchar(255) NOT NULL,
			`LAN_2_IP` varchar(255) NOT NULL,
			`LAN_2_Virtual_IP` varchar(255) NOT NULL,
			`Loopback` varchar(255) NOT NULL,
			`Routing` varchar(255) NOT NULL,
			`BGP_Peers` varchar(255) NOT NULL,
			`Previous_Router` varchar(255) NOT NULL,
			`Previous_Router_IP` varchar(255) NOT NULL,
			PRIMARY KEY (`row_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysqli_query($conn1, $query);
		if(mysqli_query($conn1, $query)){
				echo "Inserted";
			} else {
				echo "Error";
			}
	
	
$sql= "INSERT INTO `{$pmodata_kv_port10['Port MCN']}` (`row_id`, `Customer_Name`, `Note`, `ISR`, `Site`, `Region`,
 `MCN`, `GRC`, `SOC`, `Site_ID`, `Hostname`, `Resiliency`, `No_of_LCs`, `Loopback0`, `WAN_CER`, `B2B`, `IPv6_Loopback0`,
 `IPv6_WAN_CER`, `IPv6_B2B`, `VPN_Name`, `VPN_MCN`, `VPN_GRC`, `VPN_Connection_Policy`, `DLCI_VPI_VCI`, `CIR`, `CoS_Type`,
 `CE_CoS_Profile`, `CE_CoS_Queuing_Shaping`, `CE_CoS_Policing`, `PE_Egress_Profile`, `PE_Egress_Queuing_Shaping`, `RG`,
 `RG_Serving_Site`, `ASN`, `ASN_Unique`, `ASN_Override`, `ASN_Prepend_Community`, `BFD`, `BFD_LAN_Option`, `IPv4_CMTU`, 
 `IPv6_CMTU`, `BVoIP`, `BVoIP_Config`, `TDM_Card`, `Concurrent_Calls`, `CUBE_Licenses`, `SOR_Site_ID`, `Site_Designation`,
 `Others`, `Catch_all_COS`, `TC`, `No_of_Public_IPs`, `Existing_Domain`, `Domain_URL`, `DNS_Provider`, `Cascaded`, `Head_End`,
 `HE_Interface`, `Connection_Type`, `Port_Type`, `Port_Speed`, `Access_Speed`, `Electrical_Interface`, `COS_Package`, `COS_Mode`,
 `Port_Level_COS`, `Token`, `NNI`, `PMTU`, `Diversity_Option`, `Package_Type`, `Chassis`, `Memory`, `IOS`, `Licenses`, `PVDMs`,
 `Cards`, `Other_Items`, `Cables`, `BIB_Add_Ons`, `NetFlow`, `IP_Address_Handling`, `Installation_Option`, `Maintenance_Option`,
 `Migration_Option`, `Anira_as_OOB`, `WOOB`, `Enh_Reporting`, `CSU_Vendor`, `External_CSU_Model`, `CSU_LAN_IP`, `CSU_LAN_Mask`,
 `Probe_IP`, `Address`, `City`, `State`, `Country`, `Postal_Code`, `Alias`, `Technical_Contact_Name`, `Technical_Contact_Phone`,
 `Technical_Contact_Email`, `Request_Originator_Name`, `Request_Originator_Phone`, `Request_Originator_Email`, `Billing_Contact_Name`,
 `Billing_Contact_Phone`, `Billing_Contact_Email`, `Customer_Purchase_Decision_Date`, `Customer_Requested_Due_Date`,
 `Best_Available_Due_Date`, `Refuse_Early_Service_Activation`, `AD_Hostname`, `AD_Loopback`, `AD_Package_Type`, `AD_IOS`,
 `RDS_Filename`, `RDS_Notes`, `LAN_1_IP`, `LAN_1_Virtual_IP`, `LAN_2_IP`, `LAN_2_Virtual_IP`, `Loopback`, `Routing`, `BGP_Peers`,
 `Previous_Router`, `Previous_Router_IP`) VALUES (NULL, '{$pmodata_kv_port10['Authorizing Customer Business Billing Name']}', '', '', '{$site10}', '{$pmodata_kv_port10['Country code']}', '{$pmodata_kv_port10['Port MCN']}',
 '{$pmodata_kv_port10['Port GRC']}', '{$pmodata_kv_port10['Port SOC']}', '', '', '', '', '', '', '', '',
 '', '', '{$pmodata_kv_port10['VPN Name']}', '{$pmodata_kv_port10['VPN MCN']}', '{$pmodata_kv_port10['VPN GRC']}',
 '{$pmodata_kv_port10['VPN Connection Policy']}', '', '{$pmodata_kv_port10['CIR of ePVC / VLAN']}', '{$pmodata_kv_port10['Complex Class of Service?']}',
 '{$pmodata_kv_port10['CE Policing Profile Number']}', '', '', '{$pmodata_kv_port10['PE Egress CoS Profile']}', '', '',
 '', '{$pmodata_kv_port10['Autonomous System Number (ASN)']}', '', '{$pmodata_kv_port10['ASN Override?']}', '', '{$pmodata_kv_port10['BFD Heartbeat Interval']}',
 '{$pmodata_kv_port10['BFD LAN Option']}', '{$pmodata_kv_port10['IPv4 CMTU']}',
 '{$pmodata_kv_port10['IPv6 CMTU']}', '', '', '', '', '', '', '{$pmodata_kv_port10['Logical Channel Site Designation']}',
 '', '', '', '', '', '', '', '{$pmodata_kv_port10['Cascaded Access Provider']}', '{$pmodata_kv_port10['Head End Jack Type']}',
 '{$pmodata_kv_port10['Head End CPE Interface']}', '{$pmodata_kv_port10['Connection Type']}', '{$pmodata_kv_port10['Port Technology/Type']}',
 '{$pmodata_kv_port10['Port Speed']}', '{$pmodata_kv_port10['Access Speed']}', '', '{$pmodata_kv_port10['Class of Service (COS) Package']}', '{$pmodata_kv_port10['Class of Service (COS) Mode']}',
 '', '', '', '', '{$pmodata_kv_port10['AT&T VPN Diversity Option']}', '{$pmodata_kv_port10['Router Package Type']}', '', '', '', '', '',
 '', '', '', '', '{$pmodata_kv_port10['Netflow']}', '{$pmodata_kv_port10['IP Address Handling ']}', '', '',
 '', '', '', '{$pmodata_kv_port10['Is Enhanced Reporting required for this site?']}', '{$pmodata_kv_port10['CSU Vendor']}',
 '{$pmodata_kv_port10['External CSU Model (where applicable)']}', '', '',
 '', '{$pmodata_kv_port10['Street Address/Location']}', '{$pmodata_kv_port10['City']}', '', '{$pmodata_kv_port10['Country code']}',
 '{$pmodata_kv_port10['Postal or ZIP Code']}', '{$pmodata_kv_port10['Site Alias Name']}',
 '{$pmodata_kv_port10['Customer Technical Contact, overtype if different from request originator']}', '{$pmodata_kv_port10['Customer Technical Contact Phone #']}',
 '{$pmodata_kv_port10['Customer Technical Contact Email Address']}', '{$pmodata_kv_port10['Customer Contact Request Originator']}',
 '{$pmodata_kv_port10['Customer Contact Phone #']}', '{$pmodata_kv_port10['Customer Contact Email Address']}', '{$pmodata_kv_port10['Customer Billing Contact, over type if different from request originator']}',
 '{$pmodata_kv_port10['Customer Billing Contact Phone #']}', '{$pmodata_kv_port10['Customer Billing Contact Email Address']}',
 '{$pmodata_kv_port10['Customer Purchase Decision Date']}', '{$pmodata_kv_port10['Customer Requested Due Date']}',
 '{$pmodata_kv_port10['Use Best Available Due Date?']}', '{$pmodata_kv_port10['Does Customer accept early service activation?']}',
 '', '', '', '',
 '', '{$pmodata_kv_port10['Additional comments or notes']}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL',
 'NULL', 'NULL', 'NULL')";
			
				if(mysqli_query($conn1, $sql)){
				echo "Inserted";
			} else {
				echo "Error";
			}

}




$conn1->close();

?>
