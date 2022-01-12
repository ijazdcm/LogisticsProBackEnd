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
<<<<<<< HEAD
    CFormTextarea,
=======
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
} from '@coreui/react'
import { React, useState } from 'react'
import useForm from 'src/Hooks/useForm.js'
import validate from 'src/Validations/FormValidation'


const ShedMaster = () => {
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
                            <CRow className="">
                                <CCol md={3}>
<<<<<<< HEAD
                                    <CFormLabel htmlFor="dType">
=======
                                    <CFormLabel htmlFor="vehicleType">
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        Driver Type*{' '}
                                        {errors.DriverType && (
                                            <span className="help text-danger">{errors.DriverType}</span>
                                        )}
                                    </CFormLabel>

                                    <CFormSelect
                                        size="sm"
<<<<<<< HEAD
                                        name="dType"
                                        id='dType'
=======
                                        name="vehicleType"
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        onFocus={onFocus}
                                        onBlur={onBlur}
                                        onChange={handleChange}
                                        value={values.DriverType}
                                        className={`mb-1 ${errors.DriverType && 'is-invalid'}`}
                                        aria-label="Small select example"
                                    >
<<<<<<< HEAD
                                        <option >Select ...</option>
=======
                                        <option value="">Select ...</option>
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a

                                        <option value="1">Select SP</option>

                                    </CFormSelect>
                                </CCol>
                                <CCol md={3}>
<<<<<<< HEAD
                                    <CFormLabel htmlFor="shedName">Shed Name*</CFormLabel>
                                    <CFormInput
                                        name="shedName"
                                        size="sm"
                                        id="shedName"
=======
                                    <CFormLabel htmlFor="vNum">Shed Name*</CFormLabel>
                                    <CFormInput
                                        name="vNum"
                                        size="sm"
                                        id=""
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        placeholder=""
                                    />
                                </CCol>
                                <CCol md={3}>
<<<<<<< HEAD
                                    <CFormLabel htmlFor="sOwner">Shed Owner Name*</CFormLabel>
                                    <CFormInput
                                        name="sOwner"
                                        size="sm"
                                        id="sOwner"
=======
                                    <CFormLabel htmlFor="vNum">Shed Owner Name*</CFormLabel>
                                    <CFormInput
                                        name="vNum"
                                        size="sm"
                                        id=""
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        placeholder=""
                                    />
                                </CCol>
                                <CCol md={3}>
<<<<<<< HEAD
                                    <CFormLabel htmlFor="sMob1">Shed Owner Mobile Number 1*</CFormLabel>
                                    <CFormInput
                                        name="sMob1"
                                        size="sm"
                                        id="sMob1"
=======
                                    <CFormLabel htmlFor="vNum">Shed Owner Mobile Number 1*</CFormLabel>
                                    <CFormInput
                                        name="vNum"
                                        size="sm"
                                        id=""
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        placeholder=""
                                    />
                                </CCol>
                            </CRow>
                            <CRow className="">
                                <CCol md={3}>
<<<<<<< HEAD
                                    <CFormLabel htmlFor="sMob">Shed Owner Mobile Number 2*</CFormLabel>
                                    <CFormInput
                                        name="sMob"
                                        size="sm"
                                        id="sMob"
=======
                                    <CFormLabel htmlFor="vNum">Shed Owner Mobile Number 2*</CFormLabel>
                                    <CFormInput
                                        name="vNum"
                                        size="sm"
                                        id=""
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        placeholder=""
                                    />
                                </CCol>
                                <CCol md={3}>
<<<<<<< HEAD
                                    <CFormLabel htmlFor="address">Shed Owner Address*</CFormLabel>
                                    <CFormTextarea
                                        name="address"
                                        size="sm"
                                        id="address"
=======
                                    <CFormLabel htmlFor="vNum">Shed Owner Address*</CFormLabel>
                                    <CFormInput
                                        name="vNum"
                                        size="sm"
                                        id=""
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        placeholder=""
                                    />
                                </CCol>

                                <CCol md={3}>
<<<<<<< HEAD
                                    <CFormLabel htmlFor="ShedOwnerPhoto">
=======
                                    <CFormLabel htmlFor="formFileSm">
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        Shed Owner Photo*{' '}
                                        {errors.ShedOwnerPhoto && (
                                            <span className="help text-danger">{errors.ShedOwnerPhoto}</span>
                                        )}
                                    </CFormLabel>
                                    <CFormInput
                                        type="file"
                                        name="ShedOwnerPhoto"
                                        size="sm"
<<<<<<< HEAD
                                        id="ShedOwnerPhoto"
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="PAN">PAN Number</CFormLabel>
                                    <CFormInput
                                        name="PAN"
                                        size="sm"
                                        id="PAN"
=======
                                        id="formFileSm"
                                    />
                                </CCol>
                                <CCol md={3}>
                                    <CFormLabel htmlFor="vNum">PAN Number</CFormLabel>
                                    <CFormInput
                                        name="vNum"
                                        size="sm"
                                        id=""
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        placeholder=""
                                    />
                                </CCol>
                            </CRow>
                            <CRow className="">
                            <CCol md={3}>
<<<<<<< HEAD
                                    <CFormLabel htmlFor="Aadhar">Aadhar Number</CFormLabel>
                                    <CFormInput
                                        name="Aadhar"
                                        size="sm"
                                        id="Aadhar"
=======
                                    <CFormLabel htmlFor="vNum">Aadhar Number</CFormLabel>
                                    <CFormInput
                                        name="vNum"
                                        size="sm"
                                        id=""
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        placeholder=""
                                    />
                                </CCol>
                                <CCol md={3}>
<<<<<<< HEAD
                                    <CFormLabel htmlFor="GST">GST Number</CFormLabel>
                                    <CFormInput
                                        name="GST"
                                        size="sm"
                                        id="GST"
=======
                                    <CFormLabel htmlFor="vNum">GST Number</CFormLabel>
                                    <CFormInput
                                        name="vNum"
                                        size="sm"
                                        id=""
>>>>>>> bdc8ecd054b9a1532c72a49db280bd4faa8dde0a
                                        placeholder=""
                                    />
                                </CCol>
                            </CRow>
                            <CRow className="mb-md-2">

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

export default ShedMaster
