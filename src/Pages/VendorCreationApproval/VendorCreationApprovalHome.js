import { CButton, CCard, CContainer } from "@coreui/react";
import React from "react";
import { Link } from "react-router-dom";
import CustomTable from "src/components/customComponent/CustomTable";
const VendorCreationApprovalHome = () => {
  const columns = [
    {
      name: 'S.No',
      selector: (row) => row.sno,
      sortable: true,
      center: true,
    },
    {
      name: 'VA No',
      selector: (row) => row.VA_No,
      sortable: true,
      center: true,
    },
    {
      name: 'Vehicle Type',
      selector: (row) => row.Vehicle_Type,
      sortable: true,
      center: true,
    },
    {
      name: 'Vehicle No',
      selector: (row) => row.Vehicle_No,
      sortable: true,
      center: true,
    },
    {
      name: 'Driver Name',
      selector: (row) => row.Driver_Name,
      sortable: true,
      center: true,
    },
    {
      name: 'Driver Cell',
      selector: (row) => row.Driver_Cell,
      sortable: true,
      center: true,
    },
    {
      name: 'Waiting At',
      selector: (row) => row.Waiting_At,
      sortable: true,
      center: true,
    },
    {
      name: 'Screen Duration',
      selector: (row) => row.Screen_Duration,
      center: true,
    },
    {
      name: ' Overall Duration',
      selector: (row) => row.Overall_Duration,
      center: true,
    },
    {
      name: 'Action',
      selector: (row) => row.Action,
      center: true,
    },
  ]

  const data = [
    {
      id: 1,
      sno: 1,
      VA_No: 12000,
      Vehicle_Type: 'own',
      Vehicle_No: 'TN45AT8417',
      Driver_Name: 'Saravana',
      Driver_Cell: '986578932',
      Waiting_At: <span className="badge rounded-pill bg-info">DI Creation</span>,
      Screen_Duration: '0 Hrs 07 Mins',
      Overall_Duration: '0 Hrs 55 Mins',
      Action: (
        <CButton className="badge text-white" color="warning">
          <Link className="text-white" to="/VendorCreationApprovalHome/VendorCreationApproval">
            Vendor Creation App
          </Link>
        </CButton>
      ),
    },
    {
      id: 2,
      sno: 2,
      VA_No: 12070,
      Vehicle_Type: 'contract',
      Vehicle_No: 'TN54AT8417',
      Driver_Name: 'David',
      Driver_Cell: '9876542356',
      Waiting_At: <span className="badge rounded-pill bg-info">Waiting</span>,
      Screen_Duration: '0 Hrs 07 Mins',
      Overall_Duration: '0 Hrs 55 Mins',
      Action: (
        <CButton className="badge text-white" color="warning">
          Gate In
        </CButton>
      ),
    },
  ]
  return ( <CCard className="mt-4">
  <CContainer className="mt-2">
    <CustomTable columns={columns} data={data} />
  </CContainer>
</CCard> );
}

export default VendorCreationApprovalHome;
