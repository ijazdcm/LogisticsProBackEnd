import {
  CButton,
  CCard,
  CCol,
  CForm,
  CFormInput,
  CFormLabel,
  CFormSelect,
  CFormTextarea,
  CRow,
  CTabContent,
  CTabPane,
} from '@coreui/react'
import React from 'react'
import { Link } from 'react-router-dom'

const RJcustomerCreation = () => {
  return (
    <>
      <CCard>
        <CTabContent>
          <CTabPane role="tabpanel" aria-labelledby="home-tab" visible={true}>
            <CForm className="container p-3">
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="cName">Customer Name</CFormLabel>
                  <CFormInput size="sm" id="cName"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="cMob">Customer Mobile Number</CFormLabel>
                  <CFormInput size="sm" id="cMob"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="panCardattachment">PAN Card Attatchment</CFormLabel>
                  <CFormInput size="sm" type="file" id="panCardattachment"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="panCard">PAN Number</CFormLabel>
                  <CFormInput size="sm" id="panCard"  />
                </CCol>
              </CRow>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="AadharCopy">Aadhar Card</CFormLabel>
                  <CFormInput size="sm" type="file" id="AadharCopy"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="aadharCard">Aadhar Number</CFormLabel>
                  <CFormInput size="sm" id="aadharCard"  />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="bankPass">Bank Passbook</CFormLabel>
                  <CFormInput size="sm" type="file" id="bankPass"  />
                </CCol>
                <CCol xs={12} md={3}>
              <CFormLabel htmlFor="bankName">Bank Name</CFormLabel>
              <CFormSelect
                    size="sm"
                    name="bankName"
                    className=""
                    id='bankName'
                    aria-label="Small select example"
                  >
                    <option hidden>Select...</option>
                    <option value="0">Select SP</option>
                  </CFormSelect>
            </CCol>
              </CRow>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="bankBranch">Bank Branch</CFormLabel>
                  <CFormInput size="sm" id="bankBranch"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="ifscCode">Bank IFSC Code</CFormLabel>
                  <CFormInput size="sm" id="ifscCode"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="bankAccount">Bank Account Number</CFormLabel>
                  <CFormInput size="sm" id="bankAccount"  />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="Street">Street Name</CFormLabel>

                  <CFormInput size="sm" id="Street"  />
                </CCol>
              </CRow>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="Area">Area Name</CFormLabel>
                  <CFormInput size="sm" id="Area"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="City">City</CFormLabel>
                  <CFormInput size="sm" id="City"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="District">District</CFormLabel>
                  <CFormInput size="sm" id="District"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="State">State</CFormLabel>
                  <CFormInput size="sm" id="State"  />
                </CCol>
              </CRow>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="postalCode">Postal Code</CFormLabel>
                  <CFormInput size="sm" id="postalCode"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="Region">Region</CFormLabel>
                  <CFormInput size="sm" id="Region" value="Auto" readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="GST">GST Number</CFormLabel>
                  <CFormInput size="sm" id="GST"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="Payment">Payment Terms</CFormLabel>
                  <CFormInput size="sm" id="Payment"  />
                </CCol>
              </CRow>

              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Remarks</CFormLabel>
                  <CFormInput size="sm" id="inputAddress"  />
                </CCol>
              </CRow>
              <CRow className="mt-3">
                <CCol>
                  <CButton
                    size="sm"
                    color="primary"
                    // disabled={enableSubmit}
                    className="px-3 text-white"
                    type="button"
                  >
                    <Link to="/RJcustomerCreationHome"> Previous</Link>
                  </CButton>
                </CCol>
                <CCol className="offset-md-6 d-md-flex justify-content-end" xs={12} sm={12} md={3}>
                  <CButton
                    size="sm"
                    color="warning"
                    // disabled={enableSubmit}
                    className="mx-3 px-3 text-white"
                    type="submit"
                  >
                    Submit
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
          </CTabPane>
        </CTabContent>
      </CCard>
    </>
  )
}

export default RJcustomerCreation
