import { CButton, CCard, CContainer, CCol, CRow, CModal, CModalHeader, CModalTitle, CModalBody, CCardImage, CModalFooter } from "@coreui/react";
import React, { useState } from "react";
import { Link } from "react-router-dom";
import CustomTable from "src/components/customComponent/CustomTable";
const DieselVendorMasterTable = () => {
    const [DriverPhoto, setDriverPhoto] = useState(false)
    const [RCCopyFront, setRCCopyFront] = useState(false)
    const [RCCopyBack, setRCCopyBack] = useState(false)
    const [InsuranceCopyBack, setInsuranceCopyBack] = useState(false)
    const [PANNumber, setPANNumber] = useState(false)
    const columns = [
        {
            name: 'S.No',
            selector: (row) => row.sno,
            sortable: true,
            center: true,
        },
        {
            name: 'Creation Date',
            selector: (row) => row.Creation_Date,
            sortable: true,
            center: true,
        },

        {
            name: 'Diesel Vendor Name',
            selector: (row) => row.Diesel_Vendor_Name,
            sortable: true,
            center: true,
        },
        {
            name: 'Diesel Vendor Code',
            selector: (row) => row.Diesel_Vendor_Code,
            sortable: true,
            center: true,
        },
        {
            name: 'Diesel Vendor Mobile Number 1',
            selector: (row) => row.Diesel_Vendor_Mobile_Number1,
            sortable: true,
            center: true,
        },
        {
            name: 'Diesel Vendor Mobile Number 2',
            selector: (row) => row.Diesel_Vendor_Mobile_Number2,
            sortable: true,
            center: true,
        },
        {
            name: 'Diesel Vendor Mail ID',
            selector: (row) => row.Diesel_Vendor_Mail_ID,
            center: true,
        },

        {
            name: 'Status',
            selector: (row) => row.Status,
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
            sno: 1,
            Creation_Date: '12.12.2021',
            Diesel_Vendor_Name: 'HP',
            Diesel_Vendor_Code: '11111',
            Diesel_Vendor_Mobile_Number1: '9813792723',
            Diesel_Vendor_Mobile_Number2: '9813792723',
            Diesel_Vendor_Mail_ID: 'Ram@gmail.com',
            Status: <span className="badge rounded-pill bg-info">Active</span>,
            Action: (<span>
                <CButton className="btn btn-danger" color="">
                    <i className="fa fa-trash" aria-hidden="true"></i>
                </CButton>
                <CButton className="btn btn-dark" color="white">
                    <i className="fa fa-edit" aria-hidden="true"></i>
                </CButton>
            </span>
            ),
        },
    ]

    return (

        <CCard className="mt-4">
            <CContainer className="mt-2">
                <CustomTable columns={columns} data={data} />
                <hr></hr>
                <CRow className="mt-3">
                    <CCol
                        className="offset-md-6"
                        xs={15}
                        sm={15}
                        md={6}
                        style={{ display: 'flex', justifyContent: 'end' }}
                    >
                        <CButton
                            size="sm"
                            color="warning"
                            // disabled={enableSubmit}
                            className="px-3 text-white"
                            type="submit"
                        >
                            <Link className="text-white" to="/DieselVendorMaster">
                                New
                            </Link>
                        </CButton>
                    </CCol>
                </CRow>

            </CContainer>
        </CCard>
    );
}

export default DieselVendorMasterTable;
