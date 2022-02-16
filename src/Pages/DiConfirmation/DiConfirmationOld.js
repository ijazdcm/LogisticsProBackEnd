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
  const [mainKey, setMainKey] = useState(1)
  const [activeKey, setActiveKey] = useState(1)
  function login() {
    alert('No Errors CallBack Called')
  }
  return (
    <>
      <CCard>
        <CNav variant="tabs" role="tablist">
          <CNavItem>
            <CNavLink
              href="javascript:void(0);"
              active={mainKey === 1}
              onClick={() => setMainKey(1)}
            >
              Hire
            </CNavLink>
          </CNavItem>
          <CNavItem>
            <CNavLink
              href="javascript:void(0);"
              active={mainKey === 2}
              onClick={() => setMainKey(2)}
            >
              Register Vendor
            </CNavLink>
          </CNavItem>
        </CNav>
        <CTabContent>
          <CTabPane role="tabpanel" aria-labelledby="home-tab" visible={mainKey === 1}>
            <CForm className="container p-3" onSubmit={handleSubmit}>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Diesel Vendor</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Diesel Liter</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Rate Per Liter</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Total Amount</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
              </CRow>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Invoice date & Time</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="formFileSm">
                    Invoice Copy*
                    {errors.odometerPhoto && (
                      <span className="help text-danger">{errors.odometerPhoto}</span>
                    )}
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
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="remarks">Remarks*</CFormLabel>
                  <CFormTextarea
                    name="remarks"
                    id="exampleFormControlTextarea1"
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
                    Previous
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
                    Reject
                  </CButton>
                </CCol>
              </CRow>
            </CForm>
          </CTabPane>
        </CTabContent>
        <CTabContent>
          <CTabPane role="tabpanel" aria-labelledby="home-tab" visible={mainKey === 2}>
            <CForm className="container p-3" onSubmit={handleSubmit}>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Diesel Vendor</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Diesel Liter</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>

                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Rate Per Liter</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Total Amount</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
              </CRow>
              <CRow className="">
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Invoice date & Time</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="formFileSm">
                    Invoice Copy*
                    {errors.odometerPhoto && (
                      <span className="help text-danger">{errors.odometerPhoto}</span>
                    )}
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
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="inputAddress">Driver Name</CFormLabel>

                  <CFormInput size="sm" id="inputAddress"  readOnly />
                </CCol>
                <CCol xs={12} md={3}>
                  <CFormLabel htmlFor="remarks">Remarks*</CFormLabel>
                  <CFormTextarea
                    name="remarks"
                    id="exampleFormControlTextarea1"
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
                    Previous
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
                    Reject
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
