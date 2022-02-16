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
} from '@coreui/react'
import { React, useEffect, useState } from 'react'
import useForm from 'src/Hooks/useForm.js'
import VehicleMasterValidation from '../../../Utils/Master/VehicleMasterValidation'
import VehicleTypeService from 'src/Service/SmallMaster/Vehicles/VehicleTypeService'
import VehicleCapacityService from 'src/Service/SmallMaster/Vehicles/VehicleCapacityService'
import VehicleBodyTypeService from 'src/Service/SmallMaster/Vehicles/VehicleBodyTypeService'
import VehicleMasterService from 'src/Service/Master/VehicleMasterService'
import { Link, useNavigate } from 'react-router-dom'
import { ToastContainer, toast } from 'react-toastify'
import 'react-toastify/dist/ReactToastify.css'
const VehicleMaster = () => {
  const formValues = {
    vehicleType: '',
    vechileNumber: '',
    VehicleCapacity: '',
    VehicleBodyType: '',
    RCCopyFront: '',
    RCCopyBack: '',
    InsuranceCopyFront: '',
    InsuranceCopyBack: '',
    InsuranceValidity: '',
    FCValidity: '',
  }

  const [vehicleType, setVehicleType] = useState([])
  const [vehicleCapacity, setVehicleCapacity] = useState([])
  const [vehicleBody, setVehicleBody] = useState([])

  const navigation = useNavigate()

  const { values, errors, handleChange, onFocus, handleSubmit, enableSubmit, onBlur } = useForm(
    addNewVehicle,
    VehicleMasterValidation,
    formValues
  )

  function addNewVehicle() {
    const formData = new FormData()

    formData.append('vehicle_type_id', values.vehicleType)
    formData.append('vehicle_number', values.vechileNumber)
    formData.append('vehicle_capacity_id', values.VehicleCapacity)
    formData.append('vehicle_body_type_id', values.VehicleBodyType)
    formData.append('rc_copy_front', values.RCCopyFront)
    formData.append('rc_copy_back', values.RCCopyBack)
    formData.append('insurance_copy_front', values.InsuranceCopyFront)
    formData.append('insurance_copy_back', values.InsuranceCopyBack)
    formData.append('insurance_validity', values.InsuranceValidity)
    formData.append('fc_validity', values.FCValidity)

    VehicleMasterService.createVehicles(formData).then((res) => {
      if (res.status === 201) {
        toast.success('Vehicle Created Successfully!')

        setTimeout(() => {
          navigation('/VehicleMasterTable')
        }, 1000)
      }
    })
  }

  useEffect(() => {
    //section for getting vehicle type from database
    VehicleTypeService.getVehicleTypes().then((res) => {
      setVehicleType(res.data.data)
    })

    //section for getting vehicle capacity from database
    VehicleCapacityService.getVehicleCapacity().then((res) => {
      setVehicleCapacity(res.data.data)
    })

    VehicleBodyTypeService.getVehicleBody().then((res) => {
      setVehicleBody(res.data.data)
    })
  }, [])

  // console.log(values);

  return (
    <>
      <CCard>
        <CTabContent>
          <CTabPane role="tabpanel" aria-labelledby="home-tab" visible={true}>
            <CForm className="row g-3 m-2 p-1" onSubmit={handleSubmit}>
              <CRow className="mb-md-1">
                <CCol md={3}>
                  <CFormLabel htmlFor="vType">
                    Vehicle Type*{' '}
                    {errors.vehicleType && (
                      <span className="small text-danger">{errors.vehicleType}</span>
                    )}
                  </CFormLabel>
                  <CFormSelect
                    size="sm"
                    name="vehicleType"
                    onChange={handleChange}
                    onFocus={onFocus}
                    value={values.vehicleType}
                    className={`mb-1 ${errors.vehicleType && 'is-invalid'}`}
                    aria-label="Small select example"
                    id="vType"
                  >
                    <option value="0">Select ...</option>
                    {vehicleType.map(({ id, type }) => {
                      if (id <= 2) {
                        return (
                          <>
                            <option key={id} value={id}>
                              {type}
                            </option>
                          </>
                        )
                      }
                    })}
                  </CFormSelect>
                </CCol>

                <CCol md={3}>
                  <CFormLabel htmlFor="vNum">
                    Vehicle Number*
                    {errors.vechileNumber && (
                      <span className="small text-danger">{errors.vechileNumber}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    name="vechileNumber"
                    size="sm"
                    maxLength={10}
                    id="vNum"
                    onChange={handleChange}
                    value={values.vechileNumber}
                    onFocus={onFocus}
                    onBlur={onBlur}
                    placeholder=""
                  />
                </CCol>

                <CCol md={3}>
                  <CFormLabel htmlFor="vCap">
                    Vehicle Capacity*{' '}
                    {errors.VehicleCapacity && (
                      <span className="small text-danger">{errors.VehicleCapacity}</span>
                    )}
                  </CFormLabel>

                  <CFormSelect
                    size="sm"
                    name="VehicleCapacity"
                    onChange={handleChange}
                    onFocus={onFocus}
                    value={values.VehicleCapacity}
                    className={`mb-1 ${errors.VehicleCapacity && 'is-invalid'}`}
                    aria-label="Small select example"
                    id="vCap"
                  >
                    <option value="0">Select ...</option>
                    {vehicleCapacity.map(({ id, capacity }) => {
                      return (
                        <>
                          <option key={id} value={id}>
                            {capacity}
                          </option>
                        </>
                      )
                    })}
                  </CFormSelect>
                </CCol>
                <CCol md={3}>
                  <CFormLabel htmlFor="vBody">
                    Vehicle Body Type*{' '}
                    {errors.VehicleBodyType && (
                      <span className="small text-danger">{errors.VehicleBodyType}</span>
                    )}
                  </CFormLabel>
                  <CFormSelect
                    size="sm"
                    name="VehicleBodyType"
                    id="vBody"
                    onFocus={onFocus}
                    onBlur={onBlur}
                    onChange={handleChange}
                    value={values.VehicleBodyType}
                    className={`mb-1 ${errors.VehicleBodyType && 'is-invalid'}`}
                    aria-label="Small select example"
                  >
                    <option value="0">Select ...</option>

                    {vehicleBody.map(({ id, body_type }) => {
                      return (
                        <>
                          <option key={id} value={id}>
                            {body_type}
                          </option>
                        </>
                      )
                    })}
                  </CFormSelect>
                </CCol>
              </CRow>
              <CRow className="mb-md-1">
                <CCol md={3}>
                  <CFormLabel htmlFor="rcFront">
                    RC Copy Front*{' '}
                    {errors.RCCopyFront && (
                      <span className="small text-danger">{errors.RCCopyFront}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    onBlur={onBlur}
                    onChange={handleChange}
                    type="file"
                    accept=".jpg,.jpeg,.png,.pdf"
                    name="RCCopyFront"
                    size="sm"
                    id="rcFront"
                  />
                </CCol>
                <CCol md={3}>
                  <CFormLabel htmlFor="rcBack">
                    RC Copy Back*{' '}
                    {errors.RCCopyBack && (
                      <span className="small text-danger">{errors.RCCopyBack}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    onBlur={onBlur}
                    onChange={handleChange}
                    type="file"
                    accept=".jpg,.jpeg,.png,.pdf"
                    name="RCCopyBack"
                    size="sm"
                    id="rcBack"
                  />
                </CCol>
                <CCol md={3}>
                  <CFormLabel htmlFor="iFront">
                    Insurance Copy Front*{' '}
                    {errors.InsuranceCopyFront && (
                      <span className="small text-danger">{errors.InsuranceCopyFront}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    onBlur={onBlur}
                    onChange={handleChange}
                    type="file"
                    accept=".jpg,.jpeg,.png,.pdf"
                    name="InsuranceCopyFront"
                    size="sm"
                    id="iFront"
                  />
                </CCol>
                <CCol md={3}>
                  <CFormLabel htmlFor="iBack">
                    Insurance Copy Back*{' '}
                    {errors.InsuranceCopyBack && (
                      <span className="small text-danger">{errors.InsuranceCopyBack}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    onBlur={onBlur}
                    onChange={handleChange}
                    type="file"
                    required
                    accept=".jpg,.jpeg,.png,.pdf"
                    name="InsuranceCopyBack"
                    size="sm"
                    id="iBack"
                  />
                </CCol>
              </CRow>
              <CRow className="mb-md-1">
                <CCol md={3}>
                  <CFormLabel htmlFor="iValidaitiy">
                    Insurance Validity*
                    {errors.InsuranceValidity && (
                      <span className="small text-danger">{errors.InsuranceValidity}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    type="date"
                    onBlur={onBlur}
                    onFocus={onFocus}
                    onChange={handleChange}
                    size="sm"
                    required
                    value={values.InsuranceValidity}
                    id="iValidaitiy"
                    name="InsuranceValidity"
                    placeholder="date"
                  />
                </CCol>
                <CCol md={3}>
                  <CFormLabel htmlFor="fcvalid">
                    FC Validity*
                    {errors.FCValidity && (
                      <span className="small text-danger">{errors.FCValidity}</span>
                    )}
                  </CFormLabel>
                  <CFormInput
                    type="date"
                    size="sm"
                    required
                    value={values.FCValidity}
                    onBlur={onBlur}
                    onFocus={onFocus}
                    onChange={handleChange}
                    id="fcvalid"
                    name="FCValidity"
                    placeholder="date"
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
                    disabled={enableSubmit}
                  >
                    ADD
                  </CButton>
                  <Link to={'/VehicleMasterTable'}>
                    <CButton
                      size="s-lg"
                      color="warning"
                      className="mx-1 px-2 text-white"
                      type="button"
                    >
                      BACK
                    </CButton>
                  </Link>
                </CCol>
              </CRow>
            </CForm>
          </CTabPane>
        </CTabContent>
      </CCard>
    </>
  )
}

export default VehicleMaster
