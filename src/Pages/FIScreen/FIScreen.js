/* eslint-disable prettier/prettier */
import CIcon from '@coreui/icons-react'
import {
    CButton,
    CCard,
    CCol,
    CContainer,
    CForm,
    CFormInput,
    CFormLabel,
    CFormSelect,
    CNav,
    CNavItem,
    CNavLink,
    CRow,
    CTabContent,
    CTable,
    CTableBody,
    CTableDataCell,
    CTableHead,
    CTableHeaderCell,
    CTableRow,
    CTabPane,
    CFormFloating,
    CFormCheck,
    CModal,
    CModalHeader,
    CModalTitle,
    CModalBody,
    CModalFooter,
    CFormTextarea,
} from '@coreui/react'
import { cilInput, cilDescription, cilCheckCircle, cilCog } from '@coreui/icons'

import { React, useState } from 'react'
import useForm from 'src/Hooks/useForm.js'
import validate from 'src/Validations/FormValidation'
import CustomTable from '../../components/customComponent/CustomTable'
import { Link } from 'react-router-dom'

const FIScreen = () => {
    const formValues = {
        vehicleType: '',
        OdometerKm: '',
        odometerPhoto: '',
    }

    const { values, errors, handleChange, onFocus, handleSubmit, enableSubmit, onBlur } = useForm(
        login,
        validate,
        formValues
    )

    function login() {
        alert('No Errors CallBack Called')
    }

    const [visible, setVisible] = useState(false)
    // document.title=('Vehicle Inspection');
    return (
        <>
            <CCard>
                <CTabContent className="m-0 p-0">
                    <CTabPane role="tabpanel" aria-labelledby="home-tab" visible={true}>
                        <CForm className="container p-3" onSubmit={handleSubmit}>
                            <CRow className="">
                                <CCol
                                    className=""
                                    xs={12}
                                    sm={12}
                                    md={12}
                                    style={{ display: 'flex', justifyContent: 'flex-end' }}
                                >
                                    <CButton
                                        size="sm"
                                        // disabled={enableSubmit}
                                        color="warning"
                                        className="px-3 text-white"
                                        type="submit"
                                    >
                                        Import File
                                    </CButton>
                                </CCol>
                            </CRow>
                            <CRow className="">
                                <CCol xs={12} md={3}>
                                    <CFormLabel htmlFor="vNum">Vehicle Number*</CFormLabel>
                                    <CFormSelect
                                        size="sm"
                                        name="vNum"
                                        id='vNum'
                                        className=""
                                        aria-label="Small select example"
                                    >
                                        <option hidden>Select...</option>
                                        <option value="0">TN57AT5467</option>
                                        <option value="1">TN57AT2123</option>
                                    </CFormSelect>
                                </CCol>
                                <CCol xs={12} md={3}>
                                    <CFormLabel htmlFor="tNum">Trip Sheet Number*</CFormLabel>
                                    <CFormSelect
                                        size="sm"
                                        id='tNum'
                                        name="tNum"
                                        className=""
                                        aria-label="Small select example"
                                    >
                                        <option hidden>Select...</option>
                                        <option value="0">OMD051221021</option>
                                        <option value="1">CTT111221121</option>
                                    </CFormSelect>
                                </CCol>
                                <CCol xs={12} md={3}>
                                    <CFormLabel htmlFor="docNum">Document Number*</CFormLabel>
                                    <CFormSelect
                                        size="sm"
                                        name="docNum"
                                        id='docNum'
                                        className=""
                                        aria-label="Small select example"
                                    >
                                        <option hidden>Select...</option>
                                        <option value="0">673246</option>
                                        <option value="1">684365</option>
                                    </CFormSelect>
                                </CCol>
                                <CCol xs={12} md={3}>
                                    <CFormLabel htmlFor="docType">Document Type*</CFormLabel>
                                    <CFormInput type="text" name="docType" size="sm" id="docType" readOnly />
                                </CCol>
                                <CCol xs={12} md={3}>
                                    <CFormLabel htmlFor="intNum">Internal Order Number*</CFormLabel>
                                    <CFormSelect
                                        size="sm"
                                        name="intNum"
                                        id='intNum'
                                        className=""
                                        aria-label="Small select example"
                                    >
                                        <option hidden>Select...</option>
                                        <option value="0">8346366364</option>
                                        <option value="1">1267542324</option>
                                    </CFormSelect>
                                </CCol>
                                <CCol xs={12} md={3}>
                                    <CFormLabel htmlFor="amount">Amount*</CFormLabel>
                                    <CFormInput type="text" name="amount" size="sm" id="amount" />
                                </CCol>
                                <CCol xs={12} md={3}>
                                    <CFormLabel htmlFor="narration">Narration*</CFormLabel>
                                    <CFormInput type="text" name="narration" size="sm" id="narration" />
                                </CCol>
                                <CCol xs={12} md={3}>
                                    <CFormLabel htmlFor="division">Division*</CFormLabel>
                                    <CFormInput type="text" name="division" size="sm" id="division" readOnly />
                                </CCol>
                                <CCol xs={12} md={3}>
                                    <CFormLabel htmlFor="remarks">Remarks</CFormLabel>
                                    <CFormTextarea id="remarks" rows="1"></CFormTextarea>
                                </CCol>
                            </CRow>

                            <CRow>
                                <CCol>
                                    <Link to="/">
                                        <CButton
                                            md={9}
                                            size="sm"
                                            color="primary"
                                            disabled=""
                                            className="text-white"
                                            type="submit"
                                        >
                                            Previous
                                        </CButton>
                                    </Link>
                                </CCol>

                                <CCol
                                    className=""
                                    xs={12}
                                    sm={12}
                                    md={3}
                                    style={{ display: 'flex', justifyContent: 'flex-end' }}
                                >
                                    <CButton
                                        size="sm"
                                        // disabled={enableSubmit}
                                        color="warning"
                                        className="px-3 text-white"
                                        type="submit"
                                    >
                                        Submit
                                    </CButton>
                                </CCol>
                            </CRow>
                        </CForm>
                    </CTabPane>
                </CTabContent>
            </CCard>
        </>
    )
}

export default FIScreen
