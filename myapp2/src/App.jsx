import { Suspense } from 'react';
import './App.css';
import { BrowserRouter as Router, Routes, Route, generatePath } from 'react-router-dom';
import Menu from './components/Menu';
import { generateRoutes } from './components/Hook';
import NotFound from './components/NotFound';

function App() {
  return (
    <Router>
      <Menu />
      <Suspense fallback={<p>Loading...</p>}>
        <Routes>
          {generateRoutes()}
          <Route path="*" element={< NotFound />}/>
        </Routes>
      </Suspense>
    </Router>
  )
}

export default App