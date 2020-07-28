import {Controller, Get, UsePipes, ValidationPipe} from '@nestjs/common';
import {Film} from "../entity/Film.entity";
import {FilmsService} from "../films/films.service";
import {Zanr} from "../entity/Zanr.entity";
import {GenresService} from "./genres.service";

@Controller('genres')
@UsePipes(new ValidationPipe())
export class GenresController {

    constructor(private readonly genresService: GenresService){
    }

    @Get()
    findAll() : Promise<Zanr[]>{
        return this.genresService.findAll();
    }
}
