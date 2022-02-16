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
                        <CFormLabel htmlFor="vType">
                            Vehicle Type
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="vType"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="vNum">
                            Vehicle Number
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="vNum"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="vCap">
                            Vehicle Capacity
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="vCap"  readOnly />
                    </CCol>
                    {/* <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inputAddress">
                            VA Number
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inputAddress"  readOnly />
                    </CCol>
                </CRow>
                <CRow className=""> */}
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="dName">
                            Driver Name*
                            {errors.dName && <span className="small text-danger">{errors.dName}</span>}
                        </CFormLabel>
                        <CFormSelect
                            size="sm"
                            name="dName"
                            onFocus={onFocus}
                            onBlur={onBlur}
                            onChange={handleChange}
                            value={values.dName}
                            className={`${errors.dName && 'is-invalid'}`}
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
                        <CFormLabel htmlFor="dMob">
                            Driver Mobile Number
                            {errors.dMob && <span className="small text-danger">{errors.dMob}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="dMob"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="OdometerKM">
                            Odometer KM
                            {errors.OdometerKM && <span className="small text-danger">{errors.OdometerKM}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="OdometerKM"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="odoImg">
                            Odometer Photo
                            {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
                        </CFormLabel>

                        <CButton
                            onClick={() => setOdometerPhoto(!OdometerPhoto)}
                            className="w-100 m-0"
                            color="info"
                            size="sm"
                            id="odoImg"
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
                {/* </CRow>
                <CRow className=""> */}
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="gateInDateTime">
                            Gate-In Date & Time
                            {errors.gateInDateTime && <span className="small text-danger">{errors.gateInDateTime}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="gateInDateTime" type="datetime-local"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="inspectionDateTime">
                            Inspection Date & Time
                            {errors.inspectionDateTime && <span className="small text-danger">{errors.inspectionDateTime}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="inspectionDateTime" type="datetime-local"  readOnly />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="verifyDate">
                            Doc. Verification Date & Time
                            {errors.verifyDate && <span className="small text-danger">{errors.verifyDate}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" type="datetime-local" id="verifyDate"  readOnly />
                    </CCol>

                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="Division">
                            Division
                            {errors.Division && <span className="small text-danger">{errors.Division}</span>}
                        </CFormLabel>
                        <CFormSelect
                            size="sm"
                            name=""
                            onFocus={onFocus}
                            onBlur={onBlur}
                            onChange={handleChange}
                            value={values.Division}
                            className={`${errors.Division && 'is-invalid'}`}
                            aria-label="Small select example"
                            id='Division'
                        >
                            <option  hidden>
                                Select...
                            </option>
                            <option value="1">NLFD</option>
                            <option value="2">NLFA</option>
                            <option value="3">NLMD</option>
                            <option value="4">NLCD</option>
                            <option value="5">NLDV</option>
                        </CFormSelect>
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="TripAdvanceElgiblity">
                            Trip Advance Eligibility*
                            {errors.TripAdvanceElgiblity && <span className="small text-danger">{errors.TripAdvanceElgiblity}</span>}
                        </CFormLabel>
                        <CFormSelect
                            size="sm"
                            name=""
                            onFocus={onFocus}
                            onBlur={onBlur}
                            onChange={handleChange}
                            value={values.TripAdvanceElgiblity}
                            className={`${errors.TripAdvanceElgiblity && 'is-invalid'}`}
                            aria-label="Small select example"
                            id='TripAdvanceElgiblity'
                        >
                            <option  hidden>
                                Select...
                            </option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </CFormSelect>
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="advanceAmt">
                            Advance Amount
                            {errors.advanceAmt && <span className="small text-danger">{errors.advanceAmt}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" id="advanceAmt" type="text"  />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="Purpose">
                            Purpose
                            {errors.Purpose && <span className="small text-danger">{errors.Purpose}</span>}
                        </CFormLabel>
                        <CFormSelect
                            size="sm"
                            name="Purpose"
                            id='Purpose'
                            onFocus={onFocus}
                            onBlur={onBlur}
                            onChange={handleChange}
                            value={values.Purpose}
                            className={`${errors.Purpose && 'is-invalid'}`}
                            aria-label="Small select example"
                        >
                            <option  hidden>
                                Select...
                            </option>
                            <option value="1">FG Sales</option>
                            <option value="2">Others</option>
                        </CFormSelect>
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="expectDelivery">
                            Expected Delivery Date & Time*
                            {errors.expectDelivery && <span className="small text-danger">{errors.expectDelivery}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" type="datetime-local" id="expectDelivery" />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="expectedReturn">
                            Expected Return Date & Time*
                            {errors.expectedReturn && <span className="small text-danger">{errors.expectedReturn}</span>}
                        </CFormLabel>
                        <CFormInput size="sm" type="datetime-local" id="expectedReturn" />
                    </CCol>
                    <CCol xs={12} md={3}>
                        <CFormLabel htmlFor="remarks">Remarks</CFormLabel>
                        <CFormTextarea id="remarks" rows="1"></CFormTextarea>
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
                        {/* <CButton
                            size="sm"
                            // disabled={enableSubmit}
                            color="warning"
                            className="px-3 text-white"
                            type="submit"
                        >
                            Cancel
                        </CButton> */}
                    </CCol>
                </CRow>
            </CForm>
        </CCard>
    )
}

export default TripSheetCreationFG
