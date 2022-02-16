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
  CFormTextarea,
} from '@coreui/react'
import { React, useState } from 'react'
import useForm from 'src/Hooks/useForm'
import validate from 'src/Validations/FormValidation'
import CustomTable from '../../components/customComponent/CustomTable'
const ParkingYardGate = () => {
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
  return (
    <>
      <CCard>
        <CTabContent>
          <CTabPane role="tabpanel" aria-labelledby="home-tab" visible={true}>
            <CForm className="container p-3" onSubmit={handleSubmit}>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Vehicle Type</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Vehicle Number</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Vehicle Capacity</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">VA Number</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
              </CRow>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Driver Name</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Driver Mobile Number</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Odometer KM</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Odometer Photo</CFormLabel>
                  <CButton
                    // onClick={() => setVisible(!visible)}
                    className="w-100"
                    color="info"
                    size="sm"
                  >
                    <span className="float-start">
                      <i className="fa fa-eye" aria-hidden="true"></i> &nbsp;View
                    </span>
                  </CButton>
                </CCol>
              </CRow>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Gate-In Date & Time</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Vehicle Inspection Date & Time</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Doc. Verification Date & Time</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Tripsheet Number</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
              </CRow>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Shed Name</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Owner Name</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Owner Cell Number</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
              </CRow>

              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Vendor Code</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Driver Outstanding</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Advance Request Form</CFormLabel>

                  <CFormInput type="file" size="sm" id="inputAddress"  />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">
                    Advance Amount*
                    {errors.OdometerKm && (
                      <span className="help text-danger">{errors.OdometerKm}</span>
                    )}
                  </CFormLabel>
                  <CFormInput size="sm" id="inputAddress"  readOnly />
                  {/* <CFormInput
                    name="Order Qty"
                    onFocus={onFocus}
                    onBlur={onBlur}
                    onChange={handleChange}
                    className={`${errors.OdometerKm && 'is-invalid'}`}
                    size="sm"
                    id="inputAddress"
                    placeholder=""
                  /> */}
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Driver Name</CFormLabel>

                  <CFormInput type="text" size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Vendor Code</CFormLabel>

                  <CFormInput type="text" size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Current Outstanding</CFormLabel>

                  <CFormInput type="text" size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Total Freight Amount</CFormLabel>

                  <CFormInput type="text" size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">80% Advance Amount</CFormLabel>

                  <CFormInput type="text" size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="remarks">Payment Through*</CFormLabel>
                  <CFormSelect
                    size="sm"
                    // className="mb-3"
                    aria-label="Small select example"
                  >
                    <option hidden>Select Payment Type</option>

                    <option value="1">Cash</option>

                    <option value="2">Diesel</option>
                  </CFormSelect>
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">OTP Generate</CFormLabel>
                  <CButton
                    // onClick={() => setVisible(!visible)}
                    className="w-100"
                    color="info"
                    size="sm"
                  >
                    <span className="float-start">
                      <i className="fa fa-key" aria-hidden="true"></i> &nbsp;Click Here To Generate
                      OTP
                    </span>
                  </CButton>
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Enter OTP*</CFormLabel>

                  <CFormInput size="sm" id="inputAddress" />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="remarks">Remarks*</CFormLabel>
                  <CFormTextarea id="exampleFormControlTextarea1" rows="1"></CFormTextarea>
                </CCol>
              </CRow>

              <CRow className="mt-3">
                <CCol>
                  <CButton
                    size="sm"
                    color="primary"
                    // disabled={enableSubmit}
                    className="px-3 text-white"
                    type="submit"
                  >
                    Previous
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
                    Submit
                  </CButton>
                  <CButton
                    size="sm"
                    color="warning"
                    // disabled={enableSubmit}
                    className="mx-3 px-3 text-white"
                    type="submit"
                  >
                    Reject
                  </CButton>
                  <CButton
                    size="sm"
                    // disabled={enableSubmit}
                    color="warning"
                    className="mx-3 px-3 text-white"
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

export default ParkingYardGate
