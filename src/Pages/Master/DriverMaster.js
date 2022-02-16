/* eslint-disable prettier/prettier */
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
import { React, useState } from 'react'
import useForm from 'src/Hooks/useForm.js'
import validate from 'src/Utils/Validation'


const DriverMaster = () => {
    const formValues = {
        vehicleType: '',
        OdometerKm: '',
        odometerPhoto: '',
    }

    const border = {
        borderColor: '#b1b7c1',
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
                <CTabContent>
                    <CTabPane role="tabpanel" aria-labelledby="home-tab" visible={true}>
                        <CForm className="row g-3 m-2 p-1" onSubmit={handleSubmit}>
                            <CRow >
                                <CCol md={3}>
                                    <CFormLabel htmlFor="dType">
                                        Driver Type*{' '}
                                        {errors.DriverType && (
                                            <span className="small text-danger">{errors.DriverType}</span>
                                        )}
                                    </CFormLabel>

                                    <CFormSelect
                                        size="sm"
                                        name="dType"
                                        id='dType'
                                        onFocus={onFocus}
                                        onBlur={onBlur}
                                        onChange={handleChange}
                                        value={values.DriverType}
                                        className={`mb-1 ${errors.DriverType && 'is-invalid'}`}
                                        aria-label="Small select example"
                                    >
                                        <option >Select ...</option>

                                        <option value="1">Own</option>

                                        <option value="2">Contract</option>

                                        <option value="3">Hire</option>
                                    </CFormSelect>
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="dName">Driver Name*</CFormLabel>
                                    <CFormInput
                                        name="dName"
                                        size="sm"
                                        id="dName"
                                        placeholder=""
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="dCode">Driver Code*</CFormLabel>
                                    <CFormInput
                                        name="dCode"
                                        size="sm"
                                        id="dCode"
                                        placeholder=""
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="dMob">Driver Mobile Number 1*</CFormLabel>
                                    <CFormInput
                                        name="dMob"
                                        size="sm"
                                        id="dMob"
                                        placeholder=""
                                    />
                                </CCol>
                            </CRow>
                            <CRow className="mb-md-1">
                                <CCol md={3}>
                                    <CFormLabel htmlFor="dMob1">Driver Mobile Number 2*</CFormLabel>
                                    <CFormInput
                                        name="dMob1"
                                        size="sm"
                                        id="dMob1"
                                        placeholder=""
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="licence">License Number*</CFormLabel>
                                    <CFormInput
                                        name="licence"
                                        size="sm"
                                        id="licence"
                                        placeholder=""
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="valid">License Valid To*</CFormLabel>
                                    <CFormInput
                                        type="date" size="sm" id="valid" name="valid" placeholder="date"

                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="lFront">
                                        License Copy Front*{' '}
                                        {errors.LicenseCopyFront && (
                                            <span className="small text-danger">{errors.LicenseCopyFront}</span>
                                        )}
                                    </CFormLabel>
                                    <CFormInput
                                        type="file"
                                        name="lFront"
                                        size="sm"
                                        id="lFront"
                                    />
                                </CCol>
                            </CRow>
                            <CRow className="mb-md-1">
                                <CCol md={3}>
                                    <CFormLabel htmlFor="lBack">
                                        License Copy Back*{' '}
                                        {errors.LicenseCopyBack && (
                                            <span className="small text-danger">{errors.LicenseCopyBack}</span>
                                        )}
                                    </CFormLabel>
                                    <CFormInput
                                        type="file"
                                        name="lBack"
                                        size="sm"
                                        id="lBack"
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="vStatus">License Validity Status*</CFormLabel>
                                    <CFormInput
                                        name="vStatus"
                                        size="sm"
                                        id="vStatus"
                                        placeholder=""
                                        readOnly
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="AadharCard">
                                        Aadhar Card*{' '}
                                        {errors.AadharCard && (
                                            <span className="small text-danger">{errors.AadharCard}</span>
                                        )}
                                    </CFormLabel>
                                    <CFormInput
                                        type="file"
                                        name="AadharCard"
                                        size="sm"
                                        id="AadharCard"
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="PANCard">
                                        PAN Card*{' '}
                                        {errors.PANCard && (
                                            <span className="small text-danger">{errors.PANCard}</span>
                                        )}
                                    </CFormLabel>
                                    <CFormInput
                                        type="file"
                                        name="PANCard"
                                        size="sm"
                                        id="PANCard"
                                    />
                                </CCol>
                            </CRow>
                            <CRow className="mb-md-1">
                                <CCol md={3}>
                                    <CFormLabel htmlFor="DriverPhoto">
                                        Driver Photo*{' '}
                                        {errors.DriverPhoto && (
                                            <span className="small text-danger">{errors.DriverPhoto}</span>
                                        )}
                                    </CFormLabel>
                                    <CFormInput
                                        type="file"
                                        name="DriverPhoto"
                                        size="sm"
                                        id="DriverPhoto"
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="address">Driver Address*</CFormLabel>
                                    <CFormTextarea
                                        name="address"
                                        size="sm"
                                        id="address"
                                        placeholder=""
                                    />
                                </CCol>
                            </CRow>
                            <CRow className="mb-md-1">

                                <CCol
                                    className="pull-right"
                                    xs={12}
                                    sm={12}
                                    md={12}
                                    style={{ display: 'flex', justifyContent: 'flex-end' }}
                                >
                                    <CButton
                                        size="s-lg"
                                        color="warning"
                                        className="mx-1 px-2 text-white"
                                        type="submit"
                                    >
                                        Submit
                                    </CButton>

                                    <CButton
                                        size="s-lg"
                                        color="warning"
                                        className="mx-1 px-2 text-white"
                                        type="submit"
                                    >
                                        Cancel
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

export default DriverMaster
