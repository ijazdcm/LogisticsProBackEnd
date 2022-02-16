import { CCol, CFormInput, CFormLabel, CFormSelect } from '@coreui/react'
import React, { useEffect } from 'react'
import VehicleCapacitySelectField from '../CommonComponent/VehicleCapacitySelectField'
import VehicleTypeSelectField from '../CommonComponent/VehicleTypeSelectField'
const PartySection = ({ errors, onFocus, onBlur, handleChange, values,isTouched, setIsTouched, setErrors }) => {


  useEffect(()=>{
    // setIsTouched({})
    setErrors({})
    isTouched.driverId=true
    isTouched.odometerImg=true
    isTouched.odometerKm=true
    isTouched.vehicleId=true
    values.odometerImg=''
  },[])


  return (
    <>
      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="vehicleNumber">
          Vehicle Number*
          {errors.vehicleNumber && <span className="small text-danger">{errors.vehicleNumber}</span>}
        </CFormLabel>
        <CFormInput
          size="sm"
          name="vehicleNumber"
          id="vehicleNumber"
          maxLength={10}
          onFocus={onFocus}
          onBlur={onBlur}
          onChange={handleChange}
          value={values.vehicleNumber}
        />
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="partyName">
          Party Name*
          {errors.partyName && <span className="small text-danger">{errors.partyName}</span>}
        </CFormLabel>
        <CFormInput
          size="sm"
          name="partyName"
          id="partyName"
          onFocus={onFocus}
          onBlur={onBlur}
          onChange={handleChange}
          value={values.partyName}
        />
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="vehicleCapacity">
          Vehicle Capacity In MTS*{' '}
          {errors.vehicleCapacity && <span className="small text-danger">{errors.vehicleCapacity}</span>}
        </CFormLabel>
        <VehicleCapacitySelectField onBlur={onBlur} onFocus={onFocus} handleChange={handleChange} />
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="driverName">
          Driver Name* {errors.driverName && <span className="small text-danger">{errors.driverName}</span>}
        </CFormLabel>
        <CFormInput
          size="sm"
          name="driverName"
          id="driverName"
          onFocus={onFocus}
          onBlur={onBlur}
          onChange={handleChange}
          value={values.driverName}
        />
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="driverPhoneNumber">
          Driver Contact Number*{' '}
          {errors.driverPhoneNumber && <span className="small text-danger">{errors.driverPhoneNumber}</span>}
        </CFormLabel>
        <CFormInput
          size="sm"
          name="driverPhoneNumber"
          id="driverPhoneNumber"
          onFocus={onFocus}
          onBlur={onBlur}
          onChange={handleChange}
          value={values.driverPhoneNumber}
        />
      </CCol>

      <CCol xs={12} md={3}>
        <CFormLabel htmlFor="vBody">
          Vehicle Body*
          {errors.vehicleBody && <span className="small text-danger">{errors.vehicleBody}</span>}
        </CFormLabel>
        <VehicleTypeSelectField onBlur={onBlur} onFocus={onFocus} handleChange={handleChange} />
      </CCol>
    </>
  )
}

export default PartySection
