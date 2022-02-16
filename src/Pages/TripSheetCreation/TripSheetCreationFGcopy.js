import React, { useState } from 'react'
import {
    CButton,
    CCard,
    CCardImage,
    CCol,
    CForm,
    CFormInput,
    CFormLabel,
    CModal,
    CModalBody,
    CModalFooter,
    CModalHeader,
    CModalTitle,
    CRow,
    CFormTextarea,
    CFormSelect,
} from '@coreui/react'
import useForm from 'src/Hooks/useForm'
import VendorRequestValidation from 'src/Utils/VendorCreation/VendorRequestValidation'
import { Link } from 'react-router-dom'

const TripSheetCreationFG = () => {
    const formValues = {
        vehicleType: '',
        OdometerKm: '',
        odometerPhoto: '',
    }
    const [OdometerPhoto, setOdometerPhoto] = useState(false)
    const { values, errors, handleChange, onFocus, handleSubmit, enableSubmit, onBlur } = useForm(
        login,
        VendorRequestValidation,
        formValues
    )

    function login() {
        alert('No Errors CallBack Called')
    }
    return (
        <CCard>
            <CForm className="container p-3" onSubmit={handleSubmit}>
                <CRow className="">
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Vehicle Type
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Vehicle Number
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Vehicle Capacity
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            VA Number
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress"  readOnly />
                    </CCol>
                </CRow>
                <CRow className="">
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Driver Name*
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormSelect
                            size="sm"
                            name="vehicleType"
                            onFocus={onFocus}
                            onBlur={onBlur}
                            onChange={handleChange}
                            value={values.vehicleType}
                            className={`${errors.vehicleType && 'is-invalid'}`}
                            aria-label="Small select example"
                        >
                            <option  hidden>
                                Select...
                            </option>

                            <option value="1">Mari</option>

                            <option value="2">Selvan</option>

                            <option value="3">Muthu</option>
                        </CFormSelect>
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Driver Cell No.
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Odometer KM
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Odometer Photo
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>

                        <CButton
                            onClick={() => setOdometerPhoto(!OdometerPhoto)}
                            className="w-100 m-0"
                            color="info"
                            size="sm"
                            id="inputAddress"
                        >
                            <span className="float-start">
                                <i className="fa fa-eye" aria-hidden="true"></i> &nbsp;View
                            </span>
                        </CButton>
                        <CModal visible={OdometerPhoto} onClose={() => setOdometerPhoto(false)}>
                            <CModalHeader>
                                <CModalTitle>Odometer Photo</CModalTitle>
                            </CModalHeader>
                            <CModalBody>
                                <CCardImage
                                    orientation="top"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRy8_NeahwoKut3zeWbVAhUWS59XaqVah0mYMotQ08scOqWrXWsZy39GGRedOzSV1Ao8qk&usqp=CAU"
                                />
                            </CModalBody>
                            <CModalFooter>
                                <CButton color="secondary" onClick={() => setOdometerPhoto(false)}>
                                    Close
                                </CButton>
                                <CButton color="primary">Save changes</CButton>
                            </CModalFooter>
                        </CModal>
                    </CCol>
                </CRow>
                <CRow className="">
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Gate-In Date & Time
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress" type="datetime-local"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Inspection Date & Time
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress" type="datetime-local"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Doc. Verification Date & Time
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" type="datetime-local" id="inputAddress"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Shed Name
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress"  readOnly />
                    </CCol>
                </CRow>
                <CRow className="">
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Owner Name
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress" type="text"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Owner Mobile Number
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress" type="text"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Trip Advance Eligibility
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormSelect
                            size="sm"
                            name=""
                            onFocus={onFocus}
                            onBlur={onBlur}
                            onChange={handleChange}
                            value={values.vehicleType}
                            className={`${errors.vehicleType && 'is-invalid'}`}
                            aria-label="Small select example"
                        >
                            <option  hidden>
                                Select...
                            </option>
                            <option value="1">Yes</option>
                            <option value="1">No</option>
                        </CFormSelect>
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress" >
                            Loading Quantity in Tons
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress" type="text"  />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            Freight Amount
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress" type="text"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="remarks">Remarks*</CFormLabel>
                        <CFormTextarea id="exampleFormControlTextarea1" rows="1"></CFormTextarea>
                    </CCol>
                </CRow>
                <CRow className="mt-md-3">
                    <CCol className="" xs={12} sm={12} md={3}>
                        <CButton size="sm" color="primary" className="text-white" type="button">
                            <Link className="text-white" to="/TripSheetCreationHome">
                                Previous
                            </Link>
                        </CButton>
                    </CCol>
                    <CCol
                        className="offset-md-6"
                        xs={12}
                        sm={12}
                        md={3}
                        style={{ display: 'flex', justifyContent: 'end' }}
                    >
                        <CButton
                            size="sm"
                            color="warning"
                            // disabled={enableSubmit}
                            className="mx-3 px-3 text-white"
                            type="submit"
                        >
                            Create
                        </CButton>
                        <CButton
                            size="sm"
                            // disabled={enableSubmit}
                            color="warning"
                            className="px-3 text-white"
                            type="submit"
                        >
                            Cancel
                        </CButton>
                    </CCol>
                </CRow>
            </CForm>
        </CCard>
    )
}

export default TripSheetCreationFG
