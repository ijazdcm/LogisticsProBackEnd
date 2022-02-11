// Implemented by David - Exciteon
import { React, useState, useEffect } from 'react'
import { CButton, CCard, CContainer, CSpinner } from '@coreui/react'
import { Link } from 'react-router-dom'
import { Lines } from 'react-preloaders'
import CustomTable from 'src/components/customComponent/CustomTable'
import DocsVerifyService from 'src/Service/DocsVerify/DocsVerifyService'

const DocsVerify = () => {
  const [rowData, setRowData] = useState([])
  const [spinnerHide, setSpinnerHide] = useState(false)

  let tableData = []

  const ACTION = {
    GATE_IN: 1,
    GATE_OUT: 2,
    WAIT_OUTSIDE: 3,
  }
  const loadDocsVerifyTable = () => {
    DocsVerifyService.getDocsVerifyTableData().then((res) => {
      tableData = res.data.data
      let rowDataList = []
      const filterData = tableData.filter((data) => data.vehicle__info.vehicle__type.id == 3)
      filterData.map((data, index) => {
        rowDataList.push({
          sno: index + 1,
          // Tripsheet_No: '',
          Vehicle_Type: data.vehicle__info.vehicle__type.vehicle_type,
          Vehicle_No: data.vehicle__info.vehicle_number,
          Driver_Name: data.parking_yard__info.driver_name,
          Waiting_At: (
            <span className="badge rounded-pill bg-info">
              {data.parking_status == ACTION.GATE_IN
                ? 'Vehicle Inspection'
                : data.parking_status == ACTION.WAIT_OUTSIDE
                ? 'Waiting Outside'
                : 'Docs. Verify'}
            </span>
          ),
          Screen_Duration: data.updated_at,
          Overall_Duration: data.created_at,
          Action: (
            <CButton className="badge" color="warning">
              <Link className="text-dark" to={`DocVerifyVendorAvail/${data.id}`}>
                VERIFY
              </Link>
            </CButton>
          ),
        })
      })
      setRowData(rowDataList)
      setSpinnerHide(true)
    })
  }

  useEffect(() => {
    loadDocsVerifyTable()
  }, [])

  const columns = [
    {
      name: 'S.No',
      selector: (row) => row.sno,
      sortable: true,
      center: true,
    },
    // {
    //   name: 'VA No',
    //   selector: (row) => row.VA_No,
    //   sortable: true,
    //   center: true,
    // },
    // {
    //   name: 'Tripsheet No',
    //   selector: (row) => row.Tripsheet_No,
    //   sortable: true,
    //   center: true,
    // },
    {
      name: 'Vehicle Type',
      selector: (row) => row.Vehicle_Type,
      sortable: true,
      center: true,
    },
    {
      name: 'Vehicle No',
      selector: (row) => row.Vehicle_No,
      sortable: true,
      center: true,
    },
    {
      name: 'Driver Name',
      selector: (row) => row.Driver_Name,
      sortable: true,
      center: true,
    },
    {
      name: 'Waiting At',
      selector: (row) => row.Waiting_At,
      sortable: true,
      center: true,
    },
    {
      name: 'Screen Duration',
      selector: (row) => row.Screen_Duration,
      center: true,
    },
    {
      name: ' Overall Duration',
      selector: (row) => row.Overall_Duration,
      center: true,
    },
    {
      name: 'Action',
      selector: (row) => row.Action,
      center: true,
    },
  ]

  return (
    <CCard className="mt-4">
      <CContainer className="mt-2">
        <div className="text-center">
          <CSpinner color="primary" hidden={spinnerHide} />
        </div>

        <CustomTable columns={columns} data={rowData} />
      </CContainer>
    </CCard>
  )
}

export default DocsVerify
