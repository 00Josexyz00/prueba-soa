
package com.restful.service;

import com.restful.entidades.Pelicula;
import com.restful.session.PeliculaFacade;
import java.util.List;
import javax.ejb.EJB;
import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

@Path("Pelicula")
public class PeliculaRest{
    @EJB
    private PeliculaFacade peliculaFacade;
    @GET
    @Produces({MediaType.APPLICATION_JSON})
    public List<Pelicula> findall(){
        return peliculaFacade.findAll();
    }
    
    // TRAER UN ID ESPECIFICO
    @GET
    @Produces({MediaType.APPLICATION_JSON})
    @Path("{id}")
    public Pelicula findByIaD(@PathParam("id") Integer id){
        return peliculaFacade.find(id);
    }
}
