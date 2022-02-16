import {
  CButton,
  CCard,
  CCol,
  CForm,
  CFormInput,
  CFormLabel,
  CFormSelect,
  CRow,
  CFormTextarea
} from '@coreui/react'
import React, { useState } from 'react'
import { Link } from 'react-router-dom'
import useForm from 'src/Hooks/useForm'
import VendorRequestValidation from 'src/Utils/VendorCreation/VendorRequestValidation'
const TripSheetCreationSTO = () => {
  const formValues = {
    vehicleType: '',
    OdometerKm: '',
    odometerPhoto: '',
  }

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
              Vehicle Type*
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

              <option value="1">Own</option>

              <option value="2">Contract</option>

              <option value="3">Hire</option>
            </CFormSelect>
          </CCol>
          <CCol xs={12} md={3}>
            <CFormLabel htmlFor="inputAddress">
              Vehicle Number*
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

              <option value="1">Own</option>

              <option value="2">Contract</option>

              <option value="3">Hire</option>
            </CFormSelect>
          </CCol>
          <CCol xs={12} md={3}>
            <CFormLabel htmlFor="inputAddress">
              Vehicle Capacity In MTS*
              {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
            </CFormLabel>
            <CFormInput size="sm" id="inputAddress"  readOnly />
          </CCol>
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

              <option value="1">Own</option>

              <option value="2">Contract</option>

              <option value="3">Hire</option>
            </CFormSelect>
          </CCol>
        </CRow>
        <CRow className="">
          <CCol xs={12} md={3}>
            <CFormLabel htmlFor="inputAddress">
              Driver Code
              {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
            </CFormLabel>
            <CFormInput size="sm" id="inputAddress"  readOnly />
          </CCol>
          <CCol xs={12} md={3}>
            <CFormLabel htmlFor="inputAddress">
              Driver Mobile Number
              {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
            </CFormLabel>
            <CFormInput size="sm" id="inputAddress"  readOnly />
          </CCol>
          <CCol xs={12} md={3}>
            <CFormLabel htmlFor="inputAddress">
              Opening KM*
              {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
            </CFormLabel>
            <CFormInput size="sm" id="inputAddress" type="number"  />
          </CCol>
          <CCol xs={12} md={3}>
            <CFormLabel htmlFor="inputAddress">
              Opening Odometer Photo*
              {errors.vehicleType && <span className="small text-danger">{errors.vehicleType}</span>}
            </CFormLabel>
            <CFormInput
              type="file"
              name="odometerPhoto"
              onFocus={onFocus}
              onBlur={onBlur}
              onChange={handleChange}
              value={values.odometerPhoto}
              className={`${errors.odometerPhoto && 'is-invalid'}`}
              size="sm"
              id="formFileSm"
            />
          </CCol><CCol xs={12} md={3}>
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

export default TripSheetCreationSTO
