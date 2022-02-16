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
import { Link } from 'react-router-dom'
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
                {/* <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">VA Number</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol> */}

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="vNum">Vehicle Number</CFormLabel>

                  <CFormInput size="sm" id="vNum"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="tNum">Tripsheet Number</CFormLabel>

                  <CFormInput size="sm" id="tNum"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="vName">Vendor Name</CFormLabel>

                  <CFormInput size="sm" id="vName"  readOnly />
                </CCol>
              {/* </CRow>
              <CRow className=""> */}
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="vCode">Vendor Code</CFormLabel>

                  <CFormInput size="sm" id="vCode"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="dLtr">Diesel Liters</CFormLabel>

                  <CFormInput size="sm" id="dLtr"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="invoice">
                    Invoice Number*
                    {errors.invoice && (
                      <span className="help text-danger">{errors.invoice}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    name="invoice"
                    onFocus={onFocus}
                    onBlur={onBlur}
                    onChange={handleChange}
                    className={`${errors.invoice && 'is-invalid'}`}
                    size="sm"
                    id="invoice"
                    placeholder="Km on Odometer"
                  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="invoiceCopy">
                    Invoice Copy*
                    {errors.invoiceCopy && (
                      <span className="help text-danger">{errors.invoiceCopy}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    type="file"
                    name="invoiceCopy"
                    onFocus={onFocus}
                    onBlur={onBlur}
                    onChange={handleChange}
                    value={values.invoiceCopy}
                    className={`${errors.invoiceCopy && 'is-invalid'}`}
                    size="sm"
                    id="invoiceCopy"
                  />
                </CCol>
              {/* </CRow>
              <CRow className=""> */}
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="dLtr">
                    No. Of Liters*
                    {errors.nLtr && (
                      <span className="help text-danger">{errors.nLtr}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    name="dLtr"
                    onFocus={onFocus}
                    onBlur={onBlur}
                    onChange={handleChange}
                    className={`${errors.dLtr && 'is-invalid'}`}
                    size="sm"
                    id="dLtr"
                    placeholder="Km on Odometer"
                  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="rateLtr">
                    Rate Per Liter*
                    {errors.rateLtr && (
                      <span className="help text-danger">{errors.rateLtr}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    name="rateLtr"
                    onFocus={onFocus}
                    onBlur={onBlur}
                    onChange={handleChange}
                    className={`${errors.OdometerKm && 'is-invalid'}`}
                    size="sm"
                    id="rateLtr"
                    placeholder="Km on Odometer"
                  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="dAmount">Amount</CFormLabel>
                  <CFormInput size="sm" id="dAmount"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="bunk">Bunk Reading</CFormLabel>
                  <CFormInput type="file" size="sm" id="bunk"  />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="remarks">Remarks*</CFormLabel>
                  <CFormTextarea
                    name="remarks"
                    id="remarks"
                    rows="1"
                  ></CFormTextarea>
                </CCol>
              </CRow>
              <CRow className="mt-3">
                <CCol>
                  <CButton
                    size="sm"
                    // disabled={enableSubmit}
                    color="primary"
                    className="text-white"
                    type="submit"
                  >
                      <Link className="text-white" to="/DieselIntentHome">
                  Previous
                </Link>
                  </CButton>
                </CCol>
                <CCol className="offset-md-6  d-md-flex justify-content-end" xs={12} sm={12} md={3}>
                  <CButton
                    size="sm"
                    color="warning"
                    // disabled={enableSubmit}
                    className="mx-3 text-white"
                    type="submit"
                  >
                    Submit
                  </CButton>
                  <CButton
                    size="sm"
                    // disabled={enableSubmit}
                    color="warning"
                    className="px-3 text-white"
                    type="submit"
                  >
                     <Link className="text-white" to="/DieselIntentHome">
                    Cancel
                    </Link>
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
