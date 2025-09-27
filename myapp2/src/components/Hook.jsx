import React, { lazy, useReducer } from "react";
import { Route } from "react-router-dom";
import ComingSoon from "./ComingSoon";

export const HookMap = {
  useState: () => lazy(() => import("./Hooks/useStateEx")),
  useEffect: () => lazy(() => import("./Hooks/useEffectEx")),
  usecontext: () => lazy(() => import("./Hooks/useContextEx")),
  usereducer: () => () => <ComingSoon name="useReducer" />,
  useref: () => () => <ComingSoon name="useRef" />,
  usememo: () => () => <ComingSoon name="useMemo" />,
  usecallback: () => () => <ComingSoon name="useCallback" />,
};

export function generateRoutes() {
  return Object.entries(HookMap).map(([path, importFunc]) => {
    const Component = importFunc();
    return <Route key={path} path={`/${path}`} element={<Component />} />;
  });
}
